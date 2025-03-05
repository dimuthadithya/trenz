const notyf = new Notyf({
    duration: 5000,
    position: {
        x: "right",
        y: "top",
    },
    types: [
        {
            type: "login",
            background: "rgb(61, 199, 99)", // Green for login success
            duration: 5000,
            dismissible: true,
        },
        {
            type: "logout",
            background: "rgb(255, 69, 58)", // Red for logout success
            duration: 5000,
            dismissible: true,
        },
    ],
});
