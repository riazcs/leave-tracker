"use strict";
const formAuthentication = document.querySelector("#formAuthentication");
document.addEventListener("DOMContentLoaded", function (e) {
    !(function () {
        if (formAuthentication) {
            FormValidation.formValidation(formAuthentication, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: { message: "Please enter your name" },
                            stringLength: {
                                min: 4,
                                message: "Name must be more than 4 characters",
                            },
                        },
                    },
                    username: {
                        validators: {
                            notEmpty: { message: "Please enter username" },
                            stringLength: {
                                min: 6,
                                message:
                                    "Username must be more than 6 characters",
                            },
                        },
                    },
                    email: {
                        validators: {
                            notEmpty: { message: "Please enter your email" },
                            emailAddress: {
                                message: "Please enter valid email address",
                            },
                        },
                    },
                    "email-username": {
                        validators: {
                            notEmpty: {
                                message: "Please enter email / username",
                            },
                            stringLength: {
                                min: 6,
                                message:
                                    "Username must be more than 8 characters",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: { message: "Please enter your password" },
                            stringLength: {
                                min: 8,
                                message:
                                    "Password must be more than 8 characters",
                            },
                        },
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: { message: "Please confirm password" },
                            identical: {
                                compare: function () {
                                    return formAuthentication.querySelector(
                                        '[name="password"]'
                                    ).value;
                                },
                                message:
                                    "The password and its confirm are not the same",
                            },
                        },
                    },
                    terms: {
                        validators: {
                            notEmpty: {
                                message: "Please agree terms & conditions",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".mb-3",
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    autoFocus: new FormValidation.plugins.AutoFocus(),
                },
                init: (e) => {
                    e.on("plugins.message.placed", function (e) {
                        e.element.parentElement.classList.contains(
                            "input-group"
                        ) &&
                            e.element.parentElement.insertAdjacentElement(
                                "afterend",
                                e.messageElement
                            );
                    });
                },
            });
        }
        const e = document.querySelectorAll(".numeral-mask");
        e.length &&
            e.forEach((e) => {
                new Cleave(e, { numeral: !0 });
            });
    })();
});
