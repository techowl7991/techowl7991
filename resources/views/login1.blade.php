<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Authentication</title>
    <link
      href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap"
      rel="stylesheet"
    />

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <link
      rel="shortcut icon"
      type="image/png"
      href="https://naishare.com/images/favicon.png"
    />
    <style>
      .forms-out {
        margin: 0 auto;
        font-family: "Fira Sans", sans-serif;
        padding: 15px 0;
      }
      .forms-in {
        width: 93%;
        margin: 0 auto;
        color: white;
        padding: 15px 0;
      }
      .forms-in div {
        padding: 30px 20px;
        max-width: 350px;
        margin: 0 auto;
        background: #168ab8;
        border-radius: 5px;
        margin-bottom: 15px;
      }
      .forms-in h3 {
        text-align: center;
      }
      .forms-in input {
        border: none;
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        box-sizing: border-box;
        border-radius: 3px;
      }

      .forms-in button {
        border: none;
        padding: 7px 20px;
        background: #e8f8ff;
        color: #168ab8;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
      }

      .forms-in button:hover {
        opacity: 0.7;
      }

      .hide {
        display: none;
      }

      #forgot-password {
        text-align: center;
        font-size: 13px;
        cursor: pointer;
      }

      #forgot-password:hover {
        opacity: 0.7;
      }
    </style>
  </head>
  <body>
    <div class="forms-out">
      <div class="forms-in">
        <div id="registration-page" class="hide">
          <button id="show-login">Sign In</button>
          <h3>Sign Up</h3>
          Email <br />
          <input type="email" id="registration-email" /><br />
          Confirm Email <br />
          <input
            type="email"
            id="registration-reemail"
            autocomplete="disable"
          /><br />
          Password <br />
          <input type="password" id="registration-password" /><br />
          <center><button id="register">Sign Up</button></center>
        </div>

        <div id="login-page">
          {{-- <button id="show-register">Sign Up</button> --}}
          <h3>Sign In</h3>
          Email <br />
          <input type="email" id="login-email" /><br />
          Password <br />
          <input type="password" id="login-password" /><br />
          {{-- <p id="forgot-password">Forgot Password</p> --}}
          <center><button id="login">Sign In</button></center>
        </div>

        
      </div>
    </div>
    <div id="homepage" class="hide">
        <button id="signout">Sign Out</button>
        <h3 id="uid"></h3>
        <h3 id="email"></h3>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use-->
    <script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-auth.js"></script>

    <script>
    console.log(sessionStorage.getItem("email"))
    // setCookie('username',sessionStorage.getItem("email"));
    document.cookie = "username=Max Brown;";
      // Your web app's Firebase configuration
    const firebaseConfig = {
      apiKey: "AIzaSyBLnF1PZcgvdPCOmdvQ5vAqJHVjG8lTork",
      authDomain: "guest-app-2eb59.firebaseapp.com",
      databaseURL: "https://guest-app-2eb59-default-rtdb.firebaseio.com",
      projectId: "guest-app-2eb59",
      storageBucket: "guest-app-2eb59.appspot.com",
      messagingSenderId: "694925461009",
      appId: "1:694925461009:web:98fd21d2262397b46813b0",
      measurementId: "G-9C2GHYQP2S"
    };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
    </script>

    <script>
      //invokes firebase authentication.
      const auth = firebase.auth();

    //   document.querySelector("#show-register").addEventListener("click", () => {
    //     showRegistration();
    //   });

      const showRegistration = () => {
        document.querySelector("#registration-page").classList.remove("hide");
        document.querySelector("#login-page").classList.add("hide");
        document.querySelector("#homepage").classList.add("hide");
      };

      document.querySelector("#show-login").addEventListener("click", () => {
        showLogin();
      });

      const showLogin = () => {
        document.querySelector("#registration-page").classList.add("hide");
        document.querySelector("#login-page").classList.remove("hide");
        document.querySelector("#homepage").classList.add("hide");
      };

      document.querySelector("#signout").addEventListener("click", () => {
        signOut();
      });

      const register = () => {
        const email = document.querySelector("#registration-email").value;
        const reemail = document.querySelector("#registration-reemail").value;
        const password = document.querySelector("#registration-password").value;

        if (email.trim() == "") {
          alert("Enter Email");
        } else if (password.trim().length < 7) {
          alert("Password must be at least 7 characters");
        } else if (email != reemail) {
          alert("emails do not match");
        } else {
          auth
            .createUserWithEmailAndPassword(email, password)
            .catch(function (error) {
              // Handle Errors here.
              var errorCode = error.code;
              var errorMessage = error.message;
              alert(errorMessage);
              // ...
            });
        }
      };

      document.querySelector("#register").addEventListener("click", () => {
        register();
      });

      //register when you hit the enter key
      document
        .querySelector("#registration-password")
        .addEventListener("keyup", (e) => {
          if (event.keyCode === 13) {
            e.preventDefault();

            register();
          }
        });

      const login = () => {
        const email = document.querySelector("#login-email").value;
        const password = document.querySelector("#login-password").value;

        if (email.trim() == "") {
          alert("Enter Email");
        } else if (password.trim() == "") {
          alert("Enter Password");
        } else {
          authenticate(email, password);
        }
      };

      document.querySelector("#login").addEventListener("click", () => {
        login();
      });

      //sign in when you hit enter
      document
        .querySelector("#login-password")
        .addEventListener("keyup", (e) => {
          if (event.keyCode === 13) {
            e.preventDefault();

            login();
          }
        });

      const authenticate = (email, password) => {
        const auth = firebase.auth();
        auth.signInWithEmailAndPassword(email, password);
        firebase
          .auth()
          .signInWithEmailAndPassword(email, password)
          .catch(function (error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            alert(errorMessage);
          });
      };

      const showHomepage = () => {
        document.querySelector("#registration-page").classList.add("hide");
        document.querySelector("#login-page").classList.add("hide");
        document.querySelector("#homepage").classList.remove("hide");
      };

      const signOut = () => {
        firebase
          .auth()
          .signOut()
          .then(function () {
            location.reload();
          })
          .catch(function (error) {
            alert("error signing out, check network connection");
          });
      };
      auth.onAuthStateChanged((firebaseUser) => {
        if (firebaseUser) {
            var email = firebaseUser.email;
            var uid = firebaseUser.uid;
            // alert(uid);
            sessionStorage.setItem("email", email);
            sessionStorage.setItem("uid", uid);
            document.getElementById("uid").innerText = uid;
            document.getElementById("email").innerText = email;
            window.location.href = `{{url('index/${uid}')}}`;
          // showHomepage();
        }
      });

      document
        .querySelector("#forgot-password")
        .addEventListener("click", () => {
          const email = document.querySelector("#login-email").value;
          if (email.trim() == "") {
            alert("Enter Email");
          } else {
            forgotPassword(email);
          }
        });

      const forgotPassword = (email) => {
        auth
          .sendPasswordResetEmail(email)
          .then(function () {
            alert("email sent");
          })
          .catch(function (error) {
            alert("invalid email or bad network connection");
          });
      };
    </script>
  </body>
</html>