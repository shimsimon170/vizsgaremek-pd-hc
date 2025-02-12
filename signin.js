document.querySelector("#signInForm form").addEventListener("submit", async (e) => {
    e.preventDefault();
    
    const signInEmail = document.getElementById("signInEmail").value;
    const signInPassword = document.getElementById("signInPassword").value;
  
    const response = await fetch("/login", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ signInEmail, signInPassword }),
    });
  
    const data = await response.json();
    if (response.ok) {
      alert("Login successful!");
      localStorage.setItem("token", data.token);
    } else {
      alert(data.message);
    }
  });
  