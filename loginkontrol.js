// loginControl.js
document.addEventListener("DOMContentLoaded", () => {
  const username = localStorage.getItem("username");
  const usernameDisplay = document.getElementById("usernameDisplay");
  const loginBtn = document.getElementById("loginBtn");
  const logoutBtn = document.getElementById("logoutBtn");

  if (username && usernameDisplay && loginBtn && logoutBtn) {
    usernameDisplay.textContent = "👤 " + username;
    loginBtn.style.display = "none";
    logoutBtn.style.display = "inline-block";
  }

  if (logoutBtn) {
    logoutBtn.addEventListener("click", () => {
      localStorage.removeItem("username");
      location.reload();
    });
  }
});
