<!-- Bootstrap core JavaScript-->
<!-- <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script> -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- other -->
<!-- <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.6.0.js"></script> -->

<script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyC5MrAq6bRe6jdfE1hHdlwnQrCWwNX46DU",
        authDomain: "ppatku-9ca78.firebaseapp.com",
        projectId: "ppatku-9ca78",
        storageBucket: "ppatku-9ca78.appspot.com",
        messagingSenderId: "770652432057",
        appId: "1:770652432057:web:6f78e3225ee616bc2c5d68",
        measurementId: "G-5SD9BQKLFN"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
</script>
</body>

</html>