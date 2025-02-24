$(document).ready(function () {
    console.log("eneteredd")
    $("#registerclicked").submit(function (event) {
        console.log("clicckeddd");
        event.preventDefault();

        const submitButton = $(this).find('button');
        submitButton.prop('disabled', true);
        submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

        const password = $("#password").val();
        const confirmPassword = $("#password_confirmation").val();
        const masterPassword = $("#encrypted_master_key").val();

        $("#password-error").text("");
        $("#confirm-password-error").text("");
        $("#master-password-error").text("");

        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordRegex.test(password)) {
            $("#password-error").text("Password must contain at least one uppercase letter, one number, and one special character.");
            resetButton(submitButton);
            return;
        }

        if (password !== confirmPassword) {
            $("#confirm-password-error").text("Password and Confirm Password do not match.");
            resetButton(submitButton);
            return;
        }

        if (!passwordRegex.test(masterPassword)) {
            $("#master-password-error").text("Master Password must contain at least one uppercase letter, one number, and one special character.");
            resetButton(submitButton);
            return;
        }

        $.ajax({
            url: "/store-users",
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                toastMessage("success", response.message,redirectToResendemail);
                resetButton(submitButton);
                sendEmailVerification();
            },
            error: function (xhr) {
                toastMessage("error", xhr.responseJSON?.message || "An error occurred");
                resetButton(submitButton);
            }
        });
    });

    $("#loginClicked").submit(function (event) {
        event.preventDefault();

        const submitButton = $(this).find('button');
        submitButton.prop('disabled', true);
        submitButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

        $.ajax({
            url: "/login-users",
            method: "POST",
            data: $(this).serialize(),
            success: function (response) {
                toastMessage("success", response.message);
                resetButton(submitButton);
            },
            error: function (xhr) {
                toastMessage("error", xhr.responseJSON?.message || "An error occurred");
                resetButton(submitButton);
            }
        });
    });

    $("#resendEmailBtn").click(function (event) {
        event.preventDefault();

        const reSendBtn = $(this).find('button');
        reSendBtn.prop('disabled', true);
        reSendBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

        sendEmailVerification();


    });

    function resetButton(button) {
        button.prop('disabled', false);
        button.html('Create account');
    }

    function sendEmailVerification() {
        $.ajax({
            url: "/send-email-verify",
            type: "POST",
            data: {
                email: $("#email").val(),
                _token: $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                if(response.redirect_url){
                    console.log(response.redirect_url);
                    toastMessage("success", response.message, redirectToResendemail);
                }
                toastMessage("success", response.message);
            },
            error: function (xhr) {
                toastMessage("error", xhr.responseJSON?.message);
            }
        });
    }

    function toastMessage(type, text, callback = null) {
        let newToast = document.createElement("div");
        let icon = type === "success" ? `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-check">
                <path d="M20 6 9 17l-5-5"/>
            </svg>` : `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" class="lucide lucide-octagon-alert">
                <path d="M12 16h.01"/><path d="M12 8v4"/>
            </svg>`;

        newToast.classList.add("pv-toast", type);
        newToast.innerHTML = `
            <div class='pv-toast-icon pv-toast-icon-${type}'>${icon}</div>
            <div class="pv-toast-content">
                <span class="pv-toast-msg">${text}</span>
            </div>
            <i class="pv pv-close" style="font-size:17px;color:#fff;cursor: pointer">✖</i>
            <div class="pv-toast-progress"></div>`;

        let notificationContainer = document.querySelector(".passvault-notification") || createNotificationContainer();
        notificationContainer.appendChild(newToast);

        let timeout = setTimeout(() => removeToast(newToast, callback), 5000);

        newToast.addEventListener("mouseenter", () => clearTimeout(timeout));
        newToast.addEventListener("mouseleave", () => timeout = setTimeout(() => removeToast(newToast, callback), 3000));
        newToast.querySelector(".pv-close").addEventListener("click", () => removeToast(newToast, callback));
    }

    function createNotificationContainer() {
        let container = document.createElement("div");
        container.classList.add("passvault-notification");
        document.body.appendChild(container);
        return container;
    }

    function removeToast(toast, callback) {
        toast.remove();
        if (callback && typeof callback === "function") callback();
    }

    function redirectToResendemail(){
        window.location.href = "/resend-email-verification"
    }
});
