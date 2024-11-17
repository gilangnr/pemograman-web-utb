document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (email === "user@example.com" && password === "123456") {
    alert("Login berhasil!");
    window.location.href = "dashboard.html";
  } else {
    alert("Email atau password salah. Silakan coba lagi.");
  }
});
