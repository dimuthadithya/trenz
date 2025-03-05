const notyf = new Notyf({
    duration: 5000,
    position: {
        x: "right",
        y: "top",
    },
    types: [
        {
            type: "warning",
            background: "orange",
            icon: {
                className: "material-icons",
                tagName: "i",
                text: "warning",
            },
        },
        {
            type: "success",
            background: "rgb(61, 199, 99)",
            duration: 5000,
            dismissible: true,
        },
        {
            type: "warning",
            background: "red",
            duration: 5000,
            dismissible: true,
        },
    ],
});
