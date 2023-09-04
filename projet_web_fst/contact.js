document.getElementById("contact-form").onsubmit = function (event) {
  event.preventDefault();

  // Get the form data
  const formData = new FormData(document.getElementById("contact-form"));
  const name = formData.get("name");
  const email = formData.get("email");
  const message = formData.get("message");

  (function() {
    // https://dashboard.emailjs.com/admin/account
    emailjs.init('GZ3WAJ4-BC_IuTi8e');
  })();
  
  // Replace YOUR_SERVICE_ID with your EmailJS service ID
  // Replace YOUR_TEMPLATE_ID with the ID of your EmailJS email template
  emailjs.send("service_n39qv5g", "template_robc5gg", {
    from_name: name,
    reply_to: email,
    message: message,
  })
    .then(() => {
      // Display the "Message Sent" confirmation
      document.getElementById("message-sent").classList.remove("hidden");

      // Clear the form after 2 seconds
      setTimeout(function () {
        document.getElementById("contact-form").reset();
        document.getElementById("message-sent").classList.add("hidden");
      }, 2000);
    })
    .catch((error) => {
      // An error occurred while sending the email, handle the error
      alert("Failed to send email. Please try again later.");
      console.error("EmailJS error:", error);
    });
};
