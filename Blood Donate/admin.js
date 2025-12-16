document.addEventListener("DOMContentLoaded", function () {
    if (typeof loginStatus !== "undefined") {
        if (loginStatus === "success") {
            Swal.fire({
                icon: 'success',
                title: 'Logging you in...',
                showConfirmButton: false,
                timer: 2000,
                didOpen: () => {
                    Swal.showLoading();
                }
            }).then(() => {
                window.location.href = 'admin_dashboard.php';
            });
        } else if (loginStatus === "failed") {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed!',
                text: 'Invalid Username or Password',
                confirmButtonText: 'Try Again'
            }).then(() => {
                window.history.back();
            });
        }
    }
});