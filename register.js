document.querySelector("#signUpForm form").addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const registerEmail = document.getElementById("registerEmail").value;
    const registerPassword = document.getElementById("registerPassword").value;
    const registerRePassword = document.getElementById("registerRePassword").value;
  
    const response = await fetch("/register", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ registerEmail, registerPassword, registerRePassword }),
    });
  
    const data = await response.json();
    if (response.ok) {
      alert("Registration successful!");
    } else {
      alert(data.message);
    }
  });
  