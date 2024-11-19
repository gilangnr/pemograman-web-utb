document.getElementById("registerForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const learningPath = document.getElementById("learningPath").value;

  if (!name || !email || !password || !learningPath) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Semua bidang harus diisi!",
    });
    return;
  }

  Swal.fire({
    icon: "success",
    title: "Registrasi Berhasil",
    text: `Selamat datang, ${name}! Anda telah memilih learning path: ${learningPath}.`,
    confirmButtonText: "Lanjutkan",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "login.html";
    }
  });
});
