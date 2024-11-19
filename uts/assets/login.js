document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (email === "user@example.com" && password === "123456") {
    Swal.fire({
      icon: "success",
      title: "Login Berhasil",
      text: "Selamat datang kembali!",
      confirmButtonText: "Lanjutkan",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "dashboard.html";
      }
    });
  } else {
    Swal.fire({
      icon: "error",
      title: "Login Gagal",
      text: "Email atau password salah. Silakan coba lagi.",
    });
  }
});
