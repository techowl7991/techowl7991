<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Validator;
use Session;
use Cookie;
use Maatwebsite\Excel\Facades\Excel;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use DataTables;
use GPBMetadata\Google\Firestore\V1Beta1\Firestore;
use Illuminate\Support\Arr;
use Kreait\Auth\Request\UpdateUser;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{

    private static $firestoreProjectId;
    private static $firestoreClient;


    public function emailpage(Request $request)
    {
        echo ('Getting req');
        return view('emailview');
    }

    public function index(Request $request, $mid)
    {
        if (!empty($request->session()->get('uid')) && $request->session()->get('uid') == $mid) {
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $date = date('Y-m-d');
            $up_snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->where('event_startdate', '>=', $date)->documents();
            $upcoming_count = iterator_count($up_snapshot);
            $pas_snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->where('event_startdate', '<', $date)->documents();
            $past_count = iterator_count($pas_snapshot);
            return view('tableview', compact('mid', 'upcoming_count', 'past_count'));
        } else {
            $request->session()->forget('uid');
            return redirect('/login');
        }
    }


    public function login(Request $request)
    {
        if (!empty($request->session()->get('uid'))) {
            return redirect('/index/' . $request->session()->get('uid'));
        } else {
            if ($request->isMethod('post')) {
                $factory = (new Factory)->withServiceAccount(__DIR__ . '/guest-app-2eb59-firebase-adminsdk-qfb1k-41492b265e.json');

                $database = $factory->createDatabase();
                $auth = $factory->createAuth();
                $signInResult = $auth->signInWithEmailAndPassword($request->email, $request->password);
                $userdata = $signInResult->data();
                $request->session()->put('uid', $userdata['localId']);
                return redirect('/index/' . $request->session()->get('uid'));
            } else {
                return view('login');
            }
        }
    }
    public function register(Request $request)
    {
        if (!empty($request->session()->get('uid'))) {
            return redirect('/index/' . $request->session()->get('uid'));
        } else {
            if ($request->isMethod('post')) {
                $factory = (new Factory)->withServiceAccount(__DIR__ . '/guest-app-2eb59-firebase-adminsdk-qfb1k-41492b265e.json');

                $database = $factory->createDatabase();
                $userProperties = [
                    'FirstName' => $request->fname,
                    'LastName' => $request->lname,
                    'email' => $request->email,
                    'emailVerified' => false,
                    'password' => $request->password,
                    'disabled' => false,
                    'date' => date('Y-m-d'),
                ];
                $auth = $factory->createAuth();
                $createdUser = $auth->createUser($userProperties);
                $signInResult = $auth->signInWithEmailAndPassword($request->email, $request->password);
                $userdata = $signInResult->data();
                self::$firestoreProjectId = 'guest-app-2eb59';
                self::$firestoreClient = new FirestoreClient([
                    'projectId' => self::$firestoreProjectId,
                ]);
                $docref = self::$firestoreClient->collection('users')->document($userdata['localId'])->set($userProperties);
                $uid = $request->session()->put('uid', $userdata['localId']);
                return redirect('/index/' . $request->session()->get('uid'));
            } else {
                return view('register');
            }
        }
    }

    public function printdata(Request $request, $id)
    {

        if (!empty($request->session()->get('uid'))) {
            $mid = $request->session()->get('uid');
            // dd('aj');
            session()->forget('eventid');
            Session::put('eventid', $id);
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            // dd($id);
            $snapshot1 = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($id)->snapshot()->data();
            // dd($snapshot1);
            $date = date('m/d/Y h:i:s A', strtotime($snapshot1['event_startdate']));
            $snapshot = self::$firestoreClient->collection('visitor')->document($id)->collection('visitor_details')->documents();
            $cdefine = self::$firestoreClient->collection('visitor')->document($id)->collection('visitor_details');
            $sidedata['checkedin'] = $cdefine->where('visit', '=', 'Yes')->documents()->rows();
            $sidedata['notattending'] = $cdefine->where('visit', '=', 'No')->documents()->rows();
            $sidedata['vip'] = $cdefine->where('nmtype', '=', 'VIP')->documents()->rows();
            $sidedata['reg'] = $cdefine->where('nmtype', '=', 'Reg')->documents()->rows();
            $sidedata['total'] = count($snapshot->rows());
            // dd($sidedata);
            return view('eventdetail', compact('snapshot', 'id', 'date', 'sidedata'));
        } else {
            $request->session()->forget('uid');
            return redirect('/login');
        }
    }

    public function divprnt(Request $request, $email)
    {
        dd($email);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('uid');
        return redirect('/login');
    }




    public function addEvent(Request $request)
    {
        if ($request->isMethod('post')) {
            // $eve = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->add($evedata);
            $USERID = $request->session()->get('uid');
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);

            if (date('m/d/Y h:i:s A', strtotime($request->eventstartdate)) < date('m/d/Y h:i:s A')) {
                return redirect()->back()->with('alert', 'Start Date Should Be greater then Today Date');
            }
            if (date('m/d/Y h:i:s A', strtotime($request->eventenddate)) < date('m/d/Y h:i:s A')) {
                return redirect()->back()->with('alert', 'End Date Should Be greater then Today Date');
            }

            $data = [];
            if ($request->eventtype == 'online') {
                $dat = ($request->eventurl != null) ? $request->eventurl : '';
            } else {
                $dat = ($request->eventlocation != null) ? $request->eventlocation : '';
            }

            if ($request->has('event_image')) {
                $image = $request->file('event_image');
                $extention = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $dest = public_path('eventimgs');
                $image->move($dest, $filename);
            }
            $data = [
                'event_startdate' => $request->eventstartdate,
                'event_enddate' => $request->eventenddate,
                'event_name' => $request->eventname,
                'Reg' => 0,
                'total' => 0,
                'vip' => 0,
                'password' => $request->eventpassword,
                'event_starttime' => $request->eventstarttime,
                'event_endtime' => $request->eventendtime,
                'event_timezone' => $request->eventtimezone,
                'event_type' => $request->eventtype,
                'event_sub_type' => $dat,
                'event_organizer' => $request->eventorganizer,
                'event_description' => $request->eventdesc,
                'event_image' => $filename,
            ];
            // dd($data);

            $geteventid = self::$firestoreClient->collection('eventidupdate')->documents();
            $rowid = $geteventid->rows();
            $rowiddata = $rowid[0]->data();

            $data['eventid'] = $rowiddata['id'] + 1;

            $datarow['id'] = $data['eventid'];
            self::$firestoreClient->collection('eventidupdate')->document($rowid[0]->id())->set($datarow);
            //self::$firestoreClient->collection(events)->document('one')->set($data);
            $docref = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->add($data);

            // $totalvip = 0;
            // $totalreg = 0;
            // if ($request->eventr1 == 'excal') {
            //     $reads = Excel::toArray(new \stdClass(), $request->file('eventfile'));
            //     $index = 0;
            //     foreach ($reads as  $read) {
            //         foreach ($read as $value) {
            //             if ($index == 0) {
            //             } else {
            //                 $eventData = [
            //                     'name' => $value[0],
            //                     'type' =>  $value[1],
            //                     'email' => $value[2],
            //                     'company' =>  $value[3],
            //                     'visit' => 'No',
            //                     'status' => 0
            //                 ];
            //                 if ($eventData['type'] == 'vip' or $eventData['type'] == 'VIP') {
            //                     $totalvip = $totalvip + 1;
            //                 } else {
            //                     $totalreg = $totalreg + 1;
            //                 }
            //                 $docref1 = self::$firestoreClient->collection('visitor')->document($docref->id())->collection('visitor_details')->add($eventData);
            //                 $token = $docref->id() . '(**)' . $docref1->id();
            //                 $eventData['token'] = $token;
            //                 $eventData['event_startdate'] = $request->eventstartdate;
            //                 $eventData['event_enddate'] = $request->eventenddate;
            //                 $eventData['event_name'] = $request->eventname;
            //                 $eventData['address'] = $request->address;
            //                 self::$firestoreClient->collection('eventsemail')->add($eventData);
            //             }
            //             $index = $index + 1;
            //         }
            //     }
            // }
            // else {
            //     for ($i = 0; $i < count($request->evefirstname); $i++) {
            //         if ($request->picture && $request->picture[$i]) {
            //             $file = $request->Picture[$i];
            //             // dump(base_path());
            //             $file->move(base_path('public\images'), $file->getClientOriginalName());
            //             // dd($file ,$file->getClientOriginalName());
            //             $image = 'public/images/' . $file->getClientOriginalName();
            //         } else {
            //             $image = '';
            //         }

            //         $evedata = [
            //             'nmtitle' => $request->nmtitle[$i],
            //             'firstname' => $request->evefirstname[$i],
            //             'lastname' => $request->evelastname[$i],
            //             'email' => $request->eveemail[$i],
            //             'phoneno' => $request->phoneno[$i],
            //             'mobileno' => $request->mobileno[$i],
            //             'address' => $request->address[$i],
            //             'organization' => $request->organization[$i],
            //             'twitter' => $request->twitter[$i],
            //             'linkedin' => $request->linkedin[$i],
            //             'picture' => $image,
            //             'type' => $request->evetype[$i],
            //             'company' => $request->evencname[$i],
            //             'visit' => 'No',
            //             'status' => 0
            //         ];
            //         if ($request->evetype[$i] == 'vip' or $request->evetype[$i] == 'VIP') {
            //             $totalvip = $totalvip + 1;
            //         } else {
            //             $totalreg = $totalreg + 1;
            //         }
            //         $docref1 = self::$firestoreClient->collection('visitor')->document($docref->id())->collection('visitor_details')->add($evedata);
            //         $token = $docref->id() . '(**)' . $docref1->id();
            //         $evedata['token'] = $token;
            //         $evedata['event_startdate'] = $request->eventstartdate;
            //         $evedata['event_enddate'] = $request->eventenddate;
            //         $evedata['event_name'] = $request->eventname;
            //         $evedata['address'] = $request->address;
            //         self::$firestoreClient->collection('eventsemail')->add($evedata);
            //     }
            // }
            // $data1 = [
            //     'event_startdate' => $request->eventstartdate,
            //     'event_enddate' => $request->eventenddate,
            //     'event_name' => $request->eventname,
            //     // 'address' => $request->address,
            //     'Reg' => $totalreg,
            //     'total' => $totalreg + $totalvip,
            //     'vip' => $totalvip,
            //     'password' => $request->eventpassword,

            //     'event_url' => $request->eventurl,
            //     'event_location' => $request->eventlocation,
            //     'event_starttime' => $request->eventstarttime,
            //     'event_endtime' => $request->eventendtime,
            //     'event_timezone' => $request->eventtimezone,
            //     // 'event_type' => $request->eventtype,
            // ];
            // $docref = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->document($docref->id())->set($data1);
            return redirect('/index/' . $request->session()->get('uid'));
            // dd(Excel::toCollection(collect([]), $request->file('eventfile')));
        } else {
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $snapshot = self::$firestoreClient->collection('timezone')->orderBy('timezonename', 'ASC')->documents();
            $data = $snapshot->rows();
            return view('addevent', compact('data'));
        }
    }

    public function sendEmail(Request $request)
    {
        // dd('a');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $snapshot = self::$firestoreClient->collection('eventsemail')->documents();
        $data = $snapshot->rows();
        // dd('a');
        foreach ($data as $dataevent) {
            // die;
            $eventdata = $dataevent->data();
            // dd($eventdata);
            if ($eventdata['status'] == 0) {
                // dd($dataevent);
                $data['subject'] = 'Ticket to : ' . $eventdata['event_name'];
                // $data['message'] = 'Test Email';
                $data['email'] = $eventdata['email'];
                $evedata = [
                    'name' => $eventdata['name'],
                    'email' => $eventdata['email'],
                    'type' => $eventdata['type'],
                    'company' => $eventdata['company'],
                    'visit' => $eventdata['visit'],
                    'token' => $eventdata['token'],
                    'status' => 1,
                    'event_startdate' => $eventdata['event_startdate'],
                    'event_enddate' => $eventdata['event_enddate'],
                    'event_name' => $eventdata['event_name'],
                    'url' => $eventdata['url'],
                    // 'address' => $eventdata['address']
                ];
                // $imgname = explode("(**)", $eventdata['token']);
                // $data1 = QrCode::generate($eventdata['token'], 'public/images/' . $imgname[1] . '.svg');
                // die;

                // $png = QrCode::format('png')->size(512)->generate($eventdata['token']);
                // $png = base64_encode($png);
                // $src = 'data:image/png;base64,' . $png;
                $data['message'] = '<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml"><head>
                <title></title>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                <!--[if !mso]><!-->
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
                <!--<![endif]-->
                
                </head>
                <body style="background-color: #F5F5F5; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F5F5F5;" width="100%">
                <div style="padding:10px 50px">
                <div>
                <p>Date  ' . date('d-M-Y') . '</p>
                <p>Dear ' . $eventdata['name'] . ',</p> 
                <p>In-person Invitation to the ' . $eventdata['event_name'] . '  - You’re In!</p> 
                <p>Thank you for registering for the ' . $eventdata['event_name'] . '. This is a reminder that this event will be happening ' . date('d-m-y', strtotime($eventdata['event_startdate'])) . ', from ' . date('h:i:s A', strtotime($eventdata['event_startdate'])) . ' to ' . date('h:i:s A', strtotime($eventdata['event_enddate'])) . ', held at .</p> 
                <p><a href="' . $eventdata['url'] . '">click here</a> to verify</p>
                <p>Please bring your mobile device for check-in purposes. Your device will also be used to log in to the virtual platform to participate in live chats, Q&A and polls.</p>
                <p>For more details on what to expect during your event please refer to the link here: https://nowevents.online</p>
                <p>See you soon!</p>
                <p>Best Regards,</p>
                <p>Vue From NowEvents</p></div>
                <div align="left" class="alignment" style="line-height:10px"><img src="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=' . $eventdata['token'] . '" style="display: block; border: 0; " title="Image" ></div>
                </div>
                </body></html>';

                // print_r($data['message']);
                // die;

                Mail::html($data['message'], function ($message) use ($data) {
                    $message->to($data['email'])
                        ->subject($data['subject']);
                });
                self::$firestoreClient->collection('eventsemail')->document($dataevent->id())->set($evedata);
            }
        }
    }

    public function senddata(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $mid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $snapshot1 = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($request->mnid)->snapshot()->data();
        // dd($snapshot1);
        // $pdf = PDF::loadView('printpage', compact('input','snapshot1'));
        // print_r($pdf);die;
        // return $pdf->stream('invoice.pdf');
        return view('printpage', compact('input', 'snapshot1'));
    }

    public function printbadge(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $mid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($request->mnid)->snapshot()->data();
        return view('printbadge', compact('input', 'snapshot'));
    }

    public function exportdata(Request $request)
    {

        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $snapshot = self::$firestoreClient->collection('visitor')->document($request->id)->collection('visitor_details')->documents();
        $data = $snapshot->rows();
        $dta = [];
        foreach ($data as $value) {
            // dd($value);
            $alldata['name'] = $value['evefirstname'] . ' ' . $value['evelastname'];
            $alldata['type'] = $value['type'];
            $alldata['company'] = $value['orgenization'];
            $alldata['email'] = $value['eveemail'];
            $alldata['visit'] = $value['jobtitle'];
            $alldata['qrcode'] = 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=' . $request->id . '(**)' . $value->id();
            $dta[] = $alldata;
        }
        // dd($dta);
        $fileName = "Event_export_" . date('Ymd') . ".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $showColoumn = false;
        if (!empty($dta)) {
            foreach ($dta as $developerInfo) {
                if (!$showColoumn) {
                    echo implode("\t", array_keys($developerInfo)) . "\n";
                    $showColoumn = true;
                }
                echo implode("\t", array_values($developerInfo)) . "\n";
            }
        }
        exit;
    }

    public function view_event_dt(Request $request)
    {
        $columns = array(
            0 => 'eventid',
            1 => 'event_name',
            2 => 'event_startdate',
            3 => 'event_enddate',
        );
        $input = $request->all();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // dd($_GET['mid']);
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);

        $snapshot = self::$firestoreClient->collection('events')->document($_GET['mid'])->collection('events_data')->offset($start)->limit($limit)->orderBy($order, $dir);

        // if(isset($_GET['event_name'])){
        //    if($_GET['event_name']!=""){
        //       $snapshot=$snapshot->where('event_name', 'LIKE', '%'.$_GET['event_name'].'%');
        //     }
        // }
        // if(isset($_GET['event_startdate'])){
        //    if($_GET['event_startdate']!=""){
        //       $snapshot=$snapshot->where('event_startdate', 'LIKE', '%'.$_GET['event_startdate'].'%');
        //     }
        // }
        $snapshot = $snapshot->documents();

        $query = $snapshot->rows();
        $totalTitles = count($query);
        $totalFiltered = $totalTitles;

        $titles = $query;
        if ($totalTitles != 0) {
            $data = array();
            $count = 1;
            foreach ($titles as $title) {
                $b = action('AboutController@printdata', $title->id());
                $d = action('AboutController@viewgatekeeper', $title->id());
                $c = QrCode::size(75)->generate($_GET['mid'] . '(**)' . $title->id());
                $img = asset('/public/eventimgs/' . $title['event_image']);

                $action = "<a href=" . $b . " class='btn btn-dark shadow printBtn py-1 px-3'>Detail</a>";
                $viewgate = "<a href=" . $d . " class='btn btn-dark shadow printBtn py-1 px-3'>View</a>";
                $actionQR = '<a class="btn btn-dark text-white shadow printBtn py-1 px-3" data-bs-toggle="modal" data-bs-target="#exampleModal' . $title->id() . '">View QR</a><div class="modal fade" id="exampleModal' . $title->id() . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"id="exampleModalLabel">QR Code</h5><button type="button" class="close  btn bg-transparent border-0 fs-24 fw-normal p-0 text-muted shadow-none" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><style>svg {width:100%;height:100%;}</style>' . $c . '</div></div></div></div>';

                // $image = "<a href="">Image</a>";

                $route = action('AboutController@singledelete', $title->id());
                $editroute = action('AboutController@edit', $title->id());
                $delbtn = "<a href=" . $route . " class='text-danger py-1 px-2'><i class='text-secondary img img-trash' aria-hidden='true'></i></a>";
                $edtbtn = "<a href=" . $editroute . " class='text-danger py-1 px-2'><i class='text-secondary img img-pencil' aria-hidden='true'></i></a>";
                $nestedData['eventid'] = '#A00000' . $title['eventid'];
                $nestedData['checkb'] = '<input class="" type="checkbox"  name="id[]" value="' . $title->id() . '" >';
                $nestedData['singledel'] = $delbtn;
                $nestedData['uniqueid'] = $_GET['mid'] . '(**)' . $title->id();
                $nestedData['event_image'] = '<img src="' . $img . '" alt="" width="70px" height="65px">';
                $nestedData['event_name'] = $title['event_name'];
                $nestedData['event_startdate'] = date('m/d/Y h:i:s A', strtotime($title['event_startdate']));
                $nestedData['event_enddate'] = date('m/d/Y h:i:s A', strtotime($title['event_enddate']));
                $nestedData['address'] = $edtbtn;
                $nestedData['total'] = $title['total'];
                $nestedData['vip'] = $title['vip'];
                $nestedData['gatekeeper'] = $viewgate;
                $nestedData['Reg'] = $title['Reg'];
                $nestedData['qrcode'] = $actionQR;
                $nestedData['action'] = $action;
                $data[] = $nestedData;
                $count++;
            }
        } else {
            $data = array();
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalTitles),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);
    }


    public function view_event_dt_past(Request $request)
    {
        $columns = array(
            0 => 'event_startdate',
            1 => 'event_name',
            2 => 'event_enddate',
        );
        $input = $request->all();
        $date = date('Y-m-d');
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // dd($order);
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);

        $snapshot = self::$firestoreClient->collection('events')->document($_GET['mid'])->collection('events_data')->where('event_startdate', '<', $date)->offset($start)->limit($limit)->orderBy($order, $dir);

        // if(isset($_GET['event_name'])){
        //    if($_GET['event_name']!=""){
        //       $snapshot=$snapshot->where('event_name', 'LIKE', '%'.$_GET['event_name'].'%');
        //     }
        // }
        // if(isset($_GET['event_startdate'])){
        //    if($_GET['event_startdate']!=""){
        //       $snapshot=$snapshot->where('event_startdate', 'LIKE', '%'.$_GET['event_startdate'].'%');
        //     }
        // }

        $snapshot = $snapshot->documents();
        $query = $snapshot->rows();
        $totalTitles = count($query);
        $totalFiltered = $totalTitles;

        $titles = $query;
        // dd($titles);

        if ($totalTitles != 0) {
            $data = array();
            $count = 1;
            foreach ($titles as $title) {
                $b = action('AboutController@printdata', $title->id());
                $c = QrCode::size(75)->generate($_GET['mid'] . '(**)' . $title->id());

                $action = "<a href=" . $b . " class='btn btn-primary shadow printBtn py-1 px-3'>Detail</a>";
                $actionQR = '<a class="btn btn-primary text-white shadow printBtn py-1 px-3" data-toggle="modal" data-target="#exampleModal' . $title->id() . '">View QR</a><div class="modal fade" id="exampleModal' . $title->id() . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"id="exampleModalLabel">QR Code</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><style>svg {width:100%;height:100%;}</style>' . $c . '</div></div></div></div>';

                $route = action('AboutController@singledelete', $title->id());
                $editroute = action('AboutController@edit', $title->id());
                $delbtn = "<a href=" . $route . " class='text-danger py-5 px-3'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                $edtbtn = "<a href=" . $editroute . " class='text-danger py-5 px-3'><i class='fa fa-edit' aria-hidden='true'></i></a>";
                $nestedData['id'] = $count;
                $nestedData['checkb'] = '<input class="" type="checkbox"  name="id[]" value="' . $title->id() . '" >';
                $nestedData['singledel'] = $delbtn;
                $nestedData['uniqueid'] = $_GET['mid'] . '(**)' . $title->id();
                $nestedData['event_name'] = $title['event_name'];
                $nestedData['event_startdate'] = date('m/d/Y h:i:s A', strtotime($title['event_startdate']));
                $nestedData['event_enddate'] = date('m/d/Y h:i:s A', strtotime($title['event_enddate']));
                $nestedData['address'] = $edtbtn;
                $nestedData['total'] = $title['total'];
                $nestedData['vip'] = $title['vip'];
                $nestedData['Reg'] = $title['Reg'];
                $nestedData['qrcode'] = $actionQR;
                $nestedData['action'] = $action;
                $data[] = $nestedData;
                $count++;
            }
        } else {
            $data = array();
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalTitles),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);
    }


    public function edit(Request $request, $id)
    {
        $mid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $snapshot1 = self::$firestoreClient->collection('timezone')->documents();
        $data = $snapshot1->rows();

        $snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($id)->snapshot()->data();
        // $docref1 = self::$firestoreClient->collection('visitor')->document($id)->collection('visitor_details')->documents();
        return view('editevent', compact('snapshot', 'id', 'data'));
    }

    public function update(Request $request, $id)
    {

        if ($request->isMethod('put')) {
            $USERID = $request->session()->get('uid');
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $snapshot = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->document($id)->snapshot()->data();

            if (date('m/d/Y h:i:s A', strtotime($request->eventstartdate)) < date('m/d/Y h:i:s A')) {
                return redirect()->back()->with('alert', 'Start Date Should Be greater then Today Date');
            }
            if (date('m/d/Y h:i:s A', strtotime($request->eventenddate)) < date('m/d/Y h:i:s A')) {
                return redirect()->back()->with('alert', 'End Date Should Be greater then Today Date');
            }

            $totalvip = 0;
            $totalreg = 0;

            $data1 = [];
            if ($request->eventtype == 'online') {
                $dat = ($request->eventurl != null) ? $request->eventurl : '';
            } else {
                $dat = ($request->eventlocation != null) ? $request->eventlocation : '';
            }


            if ($request->has('event_image')) {

                $destination = 'public/eventimgs/' . $snapshot['event_image'];

                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $image = $request->file('event_image');
                $extention = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $dest = public_path('eventimgs');
                $image->move($dest, $filename);
            }

            $data1 = [
                'event_startdate' => $request->eventstartdate,
                'eventid' => $request->eventid,
                'event_enddate' => $request->eventenddate,
                'event_name' => $request->eventname,
                'Reg' => 0,
                'total' => 0,
                'vip' => 0,
                'password' => $request->eventpassword,
                'event_starttime' => $request->eventstarttime,
                'event_endtime' => $request->eventendtime,
                'event_timezone' => $request->eventtimezone,
                'event_type' => $request->eventtype,
                'event_sub_type' => $dat,
                'event_organizer' => $request->eventorganizer,
                'event_description' => $request->eventdesc,
                'event_image' => $filename,

            ];
            // $data1 = [
            //     'event_startdate' => $request->eventstartdate,
            //     'event_enddate' => $request->eventenddate,
            //     'event_name' => $request->eventname,
            //     'Reg' => $totalreg,
            //     'total' => $totalreg + $totalvip,
            //     'vip' => $totalvip,
            //     'password' => $request->eventpassword,
            //     'event_url' => $request->eventurl,
            //     'event_location' => $request->eventlocation,
            //     'event_starttime' => $request->eventstarttime,
            //     'event_endtime' => $request->eventendtime,
            //     'event_timezone' => $request->eventtimezone,
            // ];            
            $docref = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->document($id)->set($data1);
            return redirect('/index/' . $request->session()->get('uid'));
        } else {
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $snapshot = self::$firestoreClient->collection('timezone')->documents();
            $data = $snapshot->rows();
            return view('editevent', compact('data'));
        }
    }


    public function singledelete(Request $request, $id)
    {
        // dd($id);
        $mid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $d = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($id)->delete();
        return redirect()->back()->with('message', 'Event Successfully Deleted');
    }

    public function multi_delete(Request $request)
    {
        $ids = $request->id;
        $mid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        foreach ($ids as $id) {
            // dd($ids);
            $snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($id)->delete();
        }
        return response()->json(['message' => 'Selected Event Successfully Deleted']);
    }

    public function multidelete_guest(Request $request)
    {
        $ids = $request->id;
        $vid = $request->vid;
        $mid = $request->session()->get('uid');
        // dd($request->all());
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        foreach ($ids as $id) {
            // dd($ids);
            $snapshot = self::$firestoreClient->collection('visitor')->document($vid)->collection('visitor_details')->document($id)->delete();
        }
        return response()->json(['message' => 'Selected Event Successfully Deleted']);
    }

    public function view_eventdetail_dt(Request $request)
    {
        $chid = $_GET['id'];
        $columns = array(
            0 => 'event_name',
            1 => 'event_startdate',
            2 => 'event_enddate',
        );
        $input = $request->all();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // dump($_GET);
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $mid = $request->session()->get('uid');
        $snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->offset($start)->limit($limit)->orderBy($order, $dir);


        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        // dd($id);
        $snapshot1 = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($_GET['id'])->snapshot()->data();

        $date = date('m/d/Y h:i:s A', strtotime($snapshot1['event_startdate']));
        $snapshot = self::$firestoreClient->collection('visitor')->document($_GET['id'])->collection('visitor_details');
        if (isset($_GET['visit'])) {
            if ($_GET['visit'] != "" && $_GET['visit'] != "undefined") {
                $snapshot = $snapshot->where('visit', '=', $_GET['visit']);
            }
        }
        if (isset($_GET['type'])) {
            if ($_GET['type'] != "" && $_GET['type'] != "undefined") {
                $snapshot = $snapshot->where('nmtype', '=', $_GET['type']);
            }
        }
        // if (isset($_GET['search'])) {
        //     if ($_GET['search'] != "" && $_GET['search'] != "undefined") {
        //         $snapshot = $snapshot->where('search', '=', $_GET['search']);
        //     }
        // }

        $snapshot = $snapshot->documents();

        $query = $snapshot->rows();
        // dd($query);
        $totalTitles = count($query);
        $totalFiltered = $totalTitles;

        $titles = $query;

        if ($totalTitles != 0) {
            $data = array();
            $count = 1;
            foreach ($titles as $title) {
                // $editroute = action('AboutController@editvisitor', $title->id());
                // $editroute = action('AboutController@viewvisitor', $title->id());
                $edtbtn = "<a role='button' onclick='openmodal(`" . $title->id() . "`,`" . $chid . "`)' data-act='edit' id='edit' class='text-danger py-0 px-3 text-decoration-none ".$title->id()." oncClickDisabled'><i class='imgs img-pen text-secondary' aria-hidden='true'></i><span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span></a>";
                $viewbtn = "<a role='button' onclick='viewmodal(`" . $title->id() . "`,`" . $chid . "`)' data-act='view' class='text-danger py-0 px-3 text-decoration-none view".$title->id()." oncClickDisabled'><i class='img img-eye text-secondary' aria-hidden='true'  id='view' ></i><span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span></a>";
                $a = action('AboutController@senddata');
                $b = action('AboutController@printbadge');
                $c = "<form action='" . $a . "' method='post'><input type='hidden' name='id' value='" . $title->id() . "'><input type='hidden' name='mnid' value='" . $_GET['id'] . "'><input type='hidden' name='name' value='" . $title['evefirstname'] . "'>
                <input type='hidden' name='company' value='" . $title['orgenization'] . "'>
                <input type='hidden' name='type' value='" . $title['type'] . "'>
                <input type='hidden' name='email' value='" . $title['eveemail'] . "'>
                <input type='hidden' name='qrvalue' value='" . $_GET['id'] . '(**)' . $title->id() . "'>
                <input type='hidden' name='date' value='" . date('d M Y', strtotime($date)) . "'>
                <input type='submit' class='btn btn-dark text-uppercase fw-semibold' style='float:left'
                    value='🖶 Print Ticket'>
                </form>
                <form action='" . $b . "' method='post'><input type='hidden' name='id' value='" . $title->id() . "'><input type='hidden' name='mnid' value='" . $_GET['id'] . "'><input type='hidden' name='name' value='" . $title['evefirstname'] . "'>
                    <input type='hidden' name='company' value='" . $title['orgenization'] . "'>
                    <input type='hidden' name='type' value='" . $title['type'] . "'>
                    <input type='hidden' name='email' value='" . $title['eveemail'] . "'>
                    <input type='hidden' name='qrvalue' value='" . $_GET['id'] . '(**)' . $title->id() . "'>
                    <input type='hidden' name='date' value='" . date('d M Y', strtotime($date)) . "'>
                    <input type='submit' class='btn btn-dark text-uppercase fw-semibold' style='margin-left: 13px;'
                        value='🖶 Print Badge'>
                </form>";

                $nestedData['id'] = $count;
                $nestedData['checkb'] = '<input class="" type="checkbox"  name="id[]" data-mid="' . $chid . '" value="' . $title->id() . '" >';
                $nestedData['name'] = $title['evefirstname'];
                $nestedData['company'] = $title['orgenization'];
                $nestedData['type'] = $title['type'];
                $nestedData['email'] = $title['eveemail'];
                $nestedData['visit'] = $title['jobtitle'];
                $nestedData['date'] = date('d M Y', strtotime($date));
                $nestedData['action'] = $c;
                $nestedData['edit'] = $edtbtn;
                $nestedData['view'] = $viewbtn;
                $data[] = $nestedData;
                $count++;
            }
        } else {
            $data = array();
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalTitles),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);
    }

    public function viewvisitor(Request $request)
    {
        // dd($request->all());
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $USERID = $request->session()->get('uid');
        $id = $request->id;
        $mid = $request->mid;
        $snapshot = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->document($id)->snapshot();
        $data = $snapshot->data();
        return response()->json($data);
    }

    public function editvisitor(Request $request)
    {
        // dd($request->all());
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $USERID = $request->session()->get('uid');
        $id = $request->id;
        $mid = $request->mid;
        $snapshot = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->document($id)->snapshot();
        $data = $snapshot->data();

        if (!empty($snapshot['guestimage'])) {

            return response()->json(['data' => $data, 'success' => 1]);
        } else {
            return response()->json(['data' => $data, 'success' => 0]);
        }
    }

    public function updateguest(Request $request)
    {
        $uid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $mid = $request->mid;
        $id1 = $request->id1;
        $id2 = $request->id2;

        $snapshot = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->document($id1)->snapshot();
        $data = $snapshot->data();
        // dd($data);




        // dd($request->guimage);
        if ($request->has('guimage') && $request->has('guimage') != '') {

            $destination = 'public/imgs/' . $snapshot['guestimage'];
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $image = $request->file('guimage');
            $extention = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $dest = public_path('imgs');
            $image->move($dest, $filename);
        } else {

            $filename = $snapshot['guestimage'];
        }

        $data = [
            'guestimage' => $filename ? $filename : '',
            'type' => ($request->type) ? $request->type : '',
            'nmtitle' => ($request->nmtitle) ? $request->nmtitle : '',
            'evefirstname' => ($request->evefirstname) ? $request->evefirstname : '',
            'evelastname' => ($request->evelastname) ? $request->evelastname : '',
            'eveemail' => ($request->eveemail) ? $request->eveemail : '',
            'jobtitle' => ($request->jobtitle) ? $request->jobtitle : '',
            'orgenization' => ($request->orgenization) ? $request->orgenization : '',
            'mobileno' => ($request->mobileno) ? $request->mobileno : '',
            'tags' => ($request->tags) ? $request->tags : '',
            'linkedin' => ($request->linkedin) ? $request->linkedin : '',
            'twitter' => ($request->twitter) ? $request->twitter : '',
            'nmtype' => ($request->nmtype) ? $request->nmtype : '',
            'visit' => 'No',
        ];
        // dd($data);
        // $docref = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->add($data);
        $docref = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->document($id1)->set($data);
        // dd($uid);
        // $snapshot = self::$firestoreClient->collection('events')->document($uid)->collection('events_data')->document($mid)->snapshot();
        // // dd($snapshot->data());
        // $snap = $snapshot->data();
        // $token = $mid . '(**)' . $docref->id();
        //             $evedata['token'] = $token;
        //             $evedata['event_startdate'] = $snap['event_startdate'];
        //             $evedata['event_enddate'] = $snap['event_enddate'];
        //             $evedata['event_name'] = $snap['event_name'];
        //             // $evedata['address'] = $snap['address'];
        //             self::$firestoreClient->collection('eventsemail')->add($evedata);

        $snapshot = self::$firestoreClient->collection('events')->document($uid)->collection('events_data')->document($mid)->snapshot();
        $snap = $snapshot->data();
        if ($data['nmtype'] == 'vip' or $data['nmtype'] == 'VIP') {
            $snap['vip'] = $snap['vip'] + 1;
            $snap['Reg'] = $snap['Reg'] - 1;
        } else {
            $snap['Reg'] = $snap['Reg'] + 1;
            $snap['vip'] = $snap['vip'] - 1;
        }
        $snap['total'] = $snap['vip'] + $snap['Reg'];
        $snapshot = self::$firestoreClient->collection('events')->document($uid)->collection('events_data')->document($mid)->set($snap);

        return redirect()->back();
    }

    public function addVisitor(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            // dd($request->all());
            // $eve = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->add($evedata);
            $USERID = $request->session()->get('uid');
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $snapshot = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->document($request->eventid)->snapshot();

            $eventdata = $snapshot->data();
            // dd($snapshot->data());
            $totalvip = $eventdata['vip'];
            $totalreg = $eventdata['Reg'];
            if ($request->eventr1 == 'excal') {
                $reads = Excel::toArray(new \stdClass(), $request->file('eventfile'));
                $index = 0;
                foreach ($reads as  $read) {
                    foreach ($read as $value) {
                        if ($index == 0) {
                        } else {
                            $eventData = [
                                'name' => $value[0],
                                'type' =>  $value[1],
                                'email' => $value[2],
                                'company' =>  $value[3],
                                'nmtype' =>  $value[4],
                                'visit' => 'No',
                                'status' => 0
                            ];
                            if ($eventData['nmtype'] == 'vip' or $eventData['nmtype'] == 'VIP') {
                                $totalvip = $totalvip + 1;
                            } else {
                                $totalreg = $totalreg + 1;
                            }
                            $docref1 = self::$firestoreClient->collection('visitor')->document($request->eventid)->collection('visitor_details')->add($eventData);
                            $token = $request->eventid . '(**)' . $docref1->id();
                            $eventData['token'] = $token;
                            $eventData['event_startdate'] = $eventdata['event_startdate'];
                            $eventData['event_enddate'] = $eventdata['event_enddate'];
                            $eventData['event_name'] = $eventdata['event_name'];
                            $eventData['address'] = $eventdata['address'];
                            self::$firestoreClient->collection('eventsemail')->add($eventData);
                        }
                        $index = $index + 1;
                    }
                }
            } else {
                for ($i = 0; $i < count($request->evename); $i++) {
                    $evedata = [
                        'name' => $request->evename[$i],
                        'email' => $request->eveemail[$i],
                        'type' => $request->evetype[$i],
                        'nmtype' => $request->nmtype[$i],
                        'company' => $request->evencname[$i],
                        'visit' => 'No',
                        'status' => 0
                    ];
                    if ($request->nmtype[$i] == 'vip' or $request->nmtype[$i] == 'VIP') {
                        $totalvip = $totalvip + 1;
                    } else {
                        $totalreg = $totalreg + 1;
                    }
                    $docref1 = self::$firestoreClient->collection('visitor')->document($id)->collection('visitor_details')->add($evedata);
                    $token = $id . '(**)' . $docref1->id();
                    $evedata['token'] = $token;
                    $evedata['event_startdate'] = $eventdata['event_startdate'];
                    $evedata['event_enddate'] = $eventdata['event_enddate'];
                    $evedata['event_name'] = $eventdata['event_name'];
                    $evedata['address'] = $eventdata['address'];
                    self::$firestoreClient->collection('eventsemail')->add($evedata);
                }
            }
            $data1 = [
                'event_startdate' => $eventdata['event_startdate'],
                'event_enddate' => $eventdata['event_enddate'],
                'event_name' => $eventdata['event_name'],
                'address' => $eventdata['address'],
                'Reg' => $totalreg,
                'total' => $totalreg + $totalvip,
                'vip' => $totalvip,
                'password' => $eventdata['password'],
            ];
            $docref = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->document($request->eventid)->set($data1);
            return redirect('/index/' . $request->session()->get('uid'));
            // dd(Excel::toCollection(collect([]), $request->file('eventfile')));
        } else {
            return view('addvisitor', compact('id'));
        }
    }

    public function analytics(Request $request)
    {
        // if (empty($request->session()->get('uid'))) {
        //     return redirect('/login');
        // } else {
        //     $mid = $request->session()->get('uid');
        return view('analytics');
        // }
    }

    public function view_analytics_dt(Request $request)
    {
        $columns = array(
            0 => 'event_name',
            1 => 'event_startdate',
            2 => 'event_enddate',
        );
        $input = $request->all();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // dd($_GET['mid']);
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);

        $snapshot = self::$firestoreClient->collection('events')->document($_GET['mid'])->collection('events_data')->offset($start)->limit($limit)->orderBy($order, $dir);

        // if(isset($_GET['event_name'])){
        //    if($_GET['event_name']!=""){
        //       $snapshot=$snapshot->where('event_name', 'LIKE', '%'.$_GET['event_name'].'%');
        //     }
        // }
        // if(isset($_GET['event_startdate'])){
        //    if($_GET['event_startdate']!=""){
        //       $snapshot=$snapshot->where('event_startdate', 'LIKE', '%'.$_GET['event_startdate'].'%');
        //     }
        // }

        $snapshot = $snapshot->documents();

        $query = $snapshot->rows();
        $totalTitles = count($query);
        $totalFiltered = $totalTitles;

        $titles = $query;

        if ($totalTitles != 0) {
            $data = array();
            $count = 1;
            foreach ($titles as $title) {
                $b = action('AboutController@analyticsview', $title->id());
                $c = QrCode::size(75)->generate($_GET['mid'] . '(**)' . $title->id());

                $action = "<a href=" . $b . " class='btn btn-primary shadow printBtn py-1 px-3'>Analytic</a>";
                $actionQR = '<a class="btn btn-primary text-white shadow printBtn py-1 px-3" data-toggle="modal" data-target="#exampleModal' . $title->id() . '">View QR</a><div class="modal fade" id="exampleModal' . $title->id() . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"id="exampleModalLabel">QR Code</h5><button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><style>svg {width:100%;height:100%;}</style>' . $c . '</div></div></div></div>';


                $nestedData['id'] = $count;
                $nestedData['uniqueid'] = $_GET['mid'] . '(**)' . $title->id();
                $nestedData['event_name'] = $title['event_name'];
                $nestedData['event_startdate'] = date('m/d/Y h:i:s A', strtotime($title['event_startdate']));
                $nestedData['event_enddate'] = date('m/d/Y h:i:s A', strtotime($title['event_enddate']));
                $nestedData['address'] = $title['address'];
                $nestedData['total'] = $title['total'];
                $nestedData['vip'] = $title['vip'];
                $nestedData['Reg'] = $title['Reg'];
                // $nestedData['qrcode'] = $actionQR;        
                $nestedData['action'] = $action;
                $data[] = $nestedData;
                $count++;
            }
        } else {
            $data = array();
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalTitles),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);
    }

    public function analyticsview(Request $request, $id)
    {

        if (!empty($request->session()->get('uid'))) {
            // dd('aj');
            $mid = $request->session()->get('uid');
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            // dd($id);
            $snapshot1 = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($id)->snapshot()->data();
            // dd($snapshot1);
            $date = date('m/d/Y h:i:s A', strtotime($snapshot1['event_startdate']));
            $snapshot = self::$firestoreClient->collection('visitor')->document($id)->collection('visitor_details')->documents();
            $cdefine = self::$firestoreClient->collection('visitor')->document($id)->collection('visitor_details');
            $sidedata['checkedin'] = $cdefine->where('visit', '=', 'Yes')->documents()->rows();
            $sidedata['notattending'] = $cdefine->where('visit', '=', 'No')->documents()->rows();
            $sidedata['vip'] = $cdefine->where('type', '=', 'VIP')->documents()->rows();
            $sidedata['reg'] = $cdefine->where('type', '=', 'Reg')->documents()->rows();
            $sidedata['total'] = count($snapshot->rows());
            return view('analyticsview', compact('snapshot', 'id', 'date', 'sidedata'));
        } else {
            $request->session()->forget('uid');
            return redirect('/login');
        }
    }

    public function view_anyalyticdetail_dt(Request $request)
    {
        $columns = array(
            0 => 'event_name',
            1 => 'event_startdate',
            2 => 'event_enddate',
        );
        $input = $request->all();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // dd($_GET['mid']);
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $mid = $request->session()->get('uid');
        $snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->offset($start)->limit($limit)->orderBy($order, $dir);


        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        // dd($id);
        $snapshot1 = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document($_GET['id'])->snapshot()->data();

        $date = date('m/d/Y h:i:s A', strtotime($snapshot1['event_startdate']));
        $snapshot = self::$firestoreClient->collection('analytics')->document($_GET['id'])->collection('viewanalytics');

        $snapshot = $snapshot->documents();

        $query = $snapshot->rows();
        $totalTitles = count($query);
        $totalFiltered = $totalTitles;

        $titles = $query;

        if ($totalTitles != 0) {
            $data = array();
            $count = 1;
            foreach ($titles as $title) {


                $nestedData['id'] = $count;
                $nestedData['name'] = $title['name'];
                $nestedData['company'] = $title['company'];
                $nestedData['email'] = $title['email'];
                $nestedData['status'] = $title['status'];
                $nestedData['date'] = date('d M Y h:i:s', strtotime($title['timestamp']));
                $data[] = $nestedData;
                $count++;
            }
        } else {
            $data = array();
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalTitles),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);
    }

    public function exportdataanalytics(Request $request)
    {

        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $snapshot = self::$firestoreClient->collection('analytics')->document($request->id)->collection('viewanalytics')->documents();
        $data = $snapshot->rows();
        // dd($data);
        $dta = [];
        foreach ($data as $value) {
            $alldata['name'] = $value['name'];
            $alldata['company'] = $value['company'];
            $alldata['email'] = $value['email'];
            $alldata['status'] = $value['status'];
            $alldata['timestamp'] = date('d M Y h:i:s', strtotime($value['timestamp']));;
            $dta[] = $alldata;
        }
        // dd($dta);
        $fileName = "Analytics_export_" . date('Ymd') . ".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        $showColoumn = false;
        if (!empty($dta)) {
            foreach ($dta as $developerInfo) {
                if (!$showColoumn) {
                    echo implode("\t", array_keys($developerInfo)) . "\n";
                    $showColoumn = true;
                }
                echo implode("\t", array_values($developerInfo)) . "\n";
            }
        }
        exit;
    }

    public function edit_user_account(Request $request, $id)
    {
        $uid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $date = date('Y-m-d');
        $snapshot = self::$firestoreClient->collection('users')->document($uid)->snapshot()->data();
        // $factory = (new Factory)->withServiceAccount(__DIR__ . '/guest-app-2eb59-firebase-adminsdk-qfb1k-41492b265e.json');
        // $database = $factory->createDatabase();
        // $auth = $factory->createAuth();
        // $user = $auth->getUser($uid);


        // $up_snapshot = self::$firestoreClient->collection('events')->document($uid);
        return view('my-account', compact('snapshot', 'id'));
    }

    public function update_user_account(Request $request, $id)
    {
        // dump($request->all());
        if ($request->isMethod('put')) {
            $factory = (new Factory)->withServiceAccount(__DIR__ . '/guest-app-2eb59-firebase-adminsdk-qfb1k-41492b265e.json');
            $auth = $factory->createAuth();
            $user = $auth->getUser($id);

            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $uid = $id;
            $userProperties = [
                'FirstName' => $request->fname,
                'LastName' => $request->lname,
                'email' => $request->email,
                'emailVerified' => false,
                'password' => $request->password,
                'disabled' => false,
                'date' => date('Y-m-d'),
            ];

            $updatedUser = $auth->updateUser($uid, $userProperties);

            $docref1 = self::$firestoreClient->collection('users')->document($uid)->set($userProperties);
            return redirect()->back()->with('success', 'Profile has been updated successfully');
        }
    }

    public function add_guest(Request $request)
    {
        $uid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $mid = $request->mid;

        $bytes = bin2hex(random_bytes(20));
        // dd($bytes);
        if ($request->type == 'RSVP') {
            $rsvpstatus = 1;
        } else {
            $rsvpstatus = 0;
        }

        if ($request->has('guestimage')) {
            $image = $request->file('guestimage');
            $extention = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $dest = public_path('imgs');
            $image->move($dest, $filename);
        }
        $data = [
            'guestimage' => ($request->guestimage) ? $filename : '',
            'type' => ($request->type) ? $request->type : '',
            'nmtitle' => ($request->nmtitle) ? $request->nmtitle : '',
            'evefirstname' => ($request->evefirstname) ? $request->evefirstname : '',
            'evelastname' => ($request->evelastname) ? $request->evelastname : '',
            'eveemail' => ($request->eveemail) ? $request->eveemail : '',
            'jobtitle' => ($request->jobtitle) ? $request->jobtitle : '',
            'orgenization' => ($request->orgenization) ? $request->orgenization : '',
            'mobileno' => ($request->mobileno) ? $request->mobileno : '',
            'tags' => ($request->tags) ? $request->tags : '',
            'linkedin' => ($request->linkedin) ? $request->linkedin : '',
            'twitter' => ($request->twitter) ? $request->twitter : '',
            'nmtype' => ($request->nmtype) ? $request->nmtype : '',
            'visit' => 'No',
            'resvpstatus' => $rsvpstatus,
            'token' => $bytes,

        ];

        // dd($data);
        $docref = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->add($data);
        $qryarr = explode('/', $docref->name());
        // $route = $mid.'-'.$qryarr;

        $route = $mid . '-' . end($qryarr);
        // dd($route);
        // dd(end($qryarr));
        if ($rsvpstatus == 1) {
            $status = 0;
            $url = "http://localhost/techowl7991/verify/$route/$bytes";
        } else {
            $status = 1;
            $url = "";
        }
        // echo'<pre>';print_r($docref);die;
        $snapshot = self::$firestoreClient->collection('events')->document($uid)->collection('events_data')->document($mid)->snapshot();
        $snap = $snapshot->data();
        if ($data['nmtype'] == 'vip' or $data['nmtype'] == 'VIP') {
            $snap['vip'] = $snap['vip'] + 1;
        } else {
            $snap['Reg'] = $snap['Reg'] + 1;
        }
        $snap['total'] = $snap['vip'] + $snap['Reg'];
        $snapshot = self::$firestoreClient->collection('events')->document($uid)->collection('events_data')->document($mid)->set($snap);
        // dd($snap);
        $token = $mid . '(**)' . $docref->id();
        $evedata['token'] = $token;
        $evedata['event_startdate'] = $snap['event_startdate'];
        $evedata['event_enddate'] = $snap['event_enddate'];
        $evedata['event_name'] = $snap['event_name'];
        $evedata['status'] = 0;
        $evedata['email'] = $request->eveemail;
        $evedata['name'] = $request->evefirstname . ' ' . $request->evelastname;
        $evedata['type'] = $request->type;
        $evedata['company'] = $request->orgenization;
        $evedata['visit'] = 'NO';
        $evedata['url'] = $url;

        // $evedata['address'] = $snap['address'];

        self::$firestoreClient->collection('eventsemail')->add($evedata);
        return redirect()->back();
    }

    public function verify(Request $request, $id, $token)
    {
        // dd($id,$token);
        $arr = explode('-', $id);
        $mid = $arr[0];
        $id = $arr[1];
        return view('verify', compact('mid', 'id'));
    }

    public function update_verifcation(Request $request)
    {
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);

        $mid = $request->mid;
        $id = $request->id;
        $snapshot = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->document($id)->snapshot();
        $snap = $snapshot->data();
        $data = [
            'type' => 'verified',
            'eveemail' => $snap['eveemail'],
            'evefirstname' => $snap['evefirstname'],
            'evelastname' => $snap['evelastname'],
            'jobtitle' => $snap['jobtitle'],
            'linkedin' => $snap['linkedin'],
            'mobileno' => $snap['mobileno'],
            'nmtitle' => $snap['nmtitle'],
            'nmtype' => $snap['nmtype'],
            'orgenization' => $snap['orgenization'],
            'resvpstatus' => $snap['resvpstatus'],
            'tags' => $snap['tags'],
            'token' => $snap['token'],
            'twitter' => $snap['twitter'],
            'visit' => 'NO',
        ];
        $docref = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->document($id)->set($data);
        // dd($docref);
    }

    public function add_guest_exl(Request $request)
    {

        $uid = $request->session()->get('uid');
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        // dd($request->eventfile);
        $mid = $request->mid;
        $reads = Excel::toArray(new \stdClass(), $request->eventfile);
        $index = 0;
        foreach ($reads as  $read) {
            foreach ($read as $value) {
                if ($index == 0) {
                } else {
                    $eventData = [
                        'nmtitle' => $value[0],
                        'evefirstname' => $value[1],
                        'evelastname' =>  $value[2],
                        'eveemail' => $value[3],
                        'jobtitle' =>  $value[4],
                        'orgenization' => $value[5],
                        'type' => $value[6],
                        'tags' => $value[7],
                        'linkedin' => $value[8],
                        'twitter' => $value[9],
                        'nmtype' => $value[10],
                        'visit' => 'No',
                    ];
                    $docref = self::$firestoreClient->collection('visitor')->document($mid)->collection('visitor_details')->add($eventData);
                    $snapshot = self::$firestoreClient->collection('events')->document($uid)->collection('events_data')->document($mid)->snapshot();
                    $snap = $snapshot->data();

                    if ($eventData['nmtype'] == 'vip' or $eventData['nmtype'] == 'VIP') {
                        $snap['vip'] = $snap['vip'] + 1;
                    } else {
                        $snap['Reg'] = $snap['Reg'] + 1;
                    }
                    $snap['total'] = $snap['vip'] + $snap['Reg'];
                    $snapshot = self::$firestoreClient->collection('events')->document($uid)->collection('events_data')->document($mid)->set($snap);

                    $token = $mid . '(**)' . $docref->id();
                    $evedata['token'] = $token;
                    $evedata['event_startdate'] = $snap['event_startdate'];
                    $evedata['event_enddate'] = $snap['event_enddate'];
                    $evedata['event_name'] = $snap['event_name'];
                    // $evedata['address'] = $snap['address'];
                    self::$firestoreClient->collection('eventsemail')->add($evedata);

                    // if ($eventData['type'] == 'vip' or $eventData['type'] == 'VIP') {
                    //     $totalvip = $totalvip + 1;
                    // } else {
                    //     $totalreg = $totalreg + 1;
                    // }

                }
                $index = $index + 1;
            }
        }
        return redirect()->back();
    }

    public function viewgatekeeper(Request $request, $mid)
    {

        if (!empty($request->session()->get('uid'))) {
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $date = date('Y-m-d');
            $up_snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->where('event_startdate', '>=', $date)->documents();
            $upcoming_count = iterator_count($up_snapshot);
            $pas_snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->where('event_startdate', '<', $date)->documents();
            $past_count = iterator_count($pas_snapshot);
            return view('viewgatekeeper', compact('mid', 'upcoming_count', 'past_count'));
        } else {
            $request->session()->forget('uid');
            return redirect('/login');
        }
    }

    public function addkeeper(Request $request, $mid)
    {
        // dd($request->all());
        if ($request->isMethod('post')) {

            // $eve = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->add($evedata);
            $USERID = $request->session()->get('uid');
            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);
            $data = [
                'keepername' => $request->keepername,
                'username' => $request->username,
                'password' => $request->password
            ];
            $docref = self::$firestoreClient->collection('gatekeeper')->document($mid)->collection('keeperdata_data')->add($data);
            return redirect('/viewgatekeeper/' . $mid);
        } else {
            return view('addkeeper', compact('mid'));
        }
    }

    public function view_guest_dt(Request $request)
    {
        $columns = array(
            0 => 'keepername',
            1 => 'username',
        );
        $input = $request->all();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        // dd($_GET['mid']);
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);

        $snapshot = self::$firestoreClient->collection('gatekeeper')->document($_GET['mid'])->collection('keeperdata_data')->offset($start)->limit($limit)->orderBy($order, $dir);



        $snapshot = $snapshot->documents();
        $query = $snapshot->rows();
        $totalTitles = count($query);
        $totalFiltered = $totalTitles;

        $titles = $query;
        // dd($titles);
        if ($totalTitles != 0) {
            $data = array();
            $count = 1;
            foreach ($titles as $title) {
                $nestedData['id'] = $count;
                $nestedData['name'] = $title['keepername'];
                $nestedData['username'] = $title['username'];
                $nestedData['password'] = $title['password'];
                $data[] = $nestedData;
                $count++;
            }
        } else {
            $data = array();
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalTitles),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        echo json_encode($json_data);
    }

    public function save_new_password(Request $request, $id)
    {
        if ($request->isMethod('put')) {

            $factory = (new Factory)->withServiceAccount(__DIR__ . '/guest-app-2eb59-firebase-adminsdk-qfb1k-41492b265e.json');
            $auth = $factory->createAuth();
            $user = $auth->getUser($id);

            self::$firestoreProjectId = 'guest-app-2eb59';
            self::$firestoreClient = new FirestoreClient([
                'projectId' => self::$firestoreProjectId,
            ]);

            $uid = $id;
            if ($request->password == $request->confirm_new_password) {
                $newpasswordProperties = [
                    'password' => $request->password,
                    'FirstName' => $request->fname,
                    'LastName' => $request->lname,
                    'email' => $request->email,
                    'emailVerified' => false,
                    'disabled' => false,
                    'date' => date('Y-m-d'),
                ];
                $docref = self::$firestoreClient->collection('users')->document($uid)->set($newpasswordProperties);
                return redirect()->back()->with('success', 'Password successfully changed !!');
            } else {
                return redirect()->back()->with('success', 'Password does not matched !!');
            }
        }
    }

    public function email(Request $request)
    {
        if (empty($request->session()->get('uid'))) {
            return redirect('/login');
        } else {
            $mid = $request->session()->get('uid');
            return view('email', compact('mid'));
        }
    }

    public function campaign_information()
    {
        return view('campaign-nformation');
    }

    public function view_email()
    {
        return view('email2');
    }

    public function get_analytics(Request $request)
    {
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $eventid = $request->session()->get('eventid');
        // dd($eventid);
        $USERID = $request->session()->get('uid');
        // $snapshot = self::$firestoreClient->collection('events')->document($USERID)->collection('events_data')->documents();
        $snapshot1 = self::$firestoreClient->collection('visitor')->document($eventid)->collection('visitor_details')->documents();
        // dd($snapshot1->rows());
        $totalguest = 0;
        $tcheckedin = 0;
        $rsvp = 0;
        foreach ($snapshot1 as $snapss) {
            $snap = $snapss->data();
            $totalguest = $totalguest + 1;
            if ($snap['visit'] == 'yes' || $snap['visit'] == 'YES') {
                $rsvp = $rsvp + 1;
            }
            if ($snap['visit'] != 'No' && $snap['visit'] != 'NO' && $snap['visit'] != 'no') {
                $tcheckedin = $tcheckedin + 1;
            }
        }
        $per = ($tcheckedin / $totalguest) * 100;

        // foreach($snapshot as $eventdata){
        //     $eve = $eventdata->data();
        //     // $totalguest = $eve['total']+$totalguest;
        //     $totalguest = 1+$totalguest;
        //     $snapshot1 = self::$firestoreClient->collection('visitor')->document($eventdata->id())->collection('visitor_details')->where('type','=','checkin')->documents();
        //     $tcheckedin = count($snapshot1->rows())+$tcheckedin;
        //     // $totalcheckedin = 0;
        //     // foreach($snapshot1 as $snapdata){
        //     //     $checkdata = $snapdata->data();
        //     //     if($checkdata['type']=='checkin'){
        //     //         $totalcheckedin = $totalcheckedin+1;
        //     //     }else{
        //     //         $totalcheckedin = $totalcheckedin;
        //     //     }
        //     // }
        //     // $tcheckedin = $tcheckedin+$totalcheckedin;
        // }
        // dd($total);
        // dd($snapshot->snapshot());
        return view('analytics', compact('totalguest', 'tcheckedin', 'rsvp', 'per'));
    }

    public function view_web(Request $request , $id){
        $mid = $request->session()->get('uid');
        // dd($mid);     
        self::$firestoreProjectId = 'guest-app-2eb59';
        self::$firestoreClient = new FirestoreClient([
            'projectId' => self::$firestoreProjectId,
        ]);
        $date = date('Y-m-d');
        $up_snapshot = self::$firestoreClient->collection('events')->document($mid)->collection('events_data')->document('fbfb808696e64c79af4b')->snapshot();
        $data = $up_snapshot->data();
        // dd($up_snapshot->data());
        return view('viewweb',compact('data','mid','id'));
        // $upcoming_count = iterator_count($up_snapshot);?

    }
    
    public function add_ver_guest(Request $request){
        dd($request->all());
    }

    public function get_setting()
    {
        return view('setting');
    }

    public function analytics_booth_name()
    {
        return view('analytics-booth-name');
    }
}
