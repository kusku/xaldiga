"use strict";

var navbarToggleLine = React.createElement("span", { "class": "icon-bar" });
var navbarToggle = React.createElement(
    "button",
    { type: "button", "class": "navbar-toggle", "data-toggle": "collapse", "data-target": "#sectionsNavBar" },
    navbarToggleLine,
    navbarToggleLine,
    navbarToggleLine
);

var navbarBrandImage = React.createElement("img", { src: "./images/logo3.png", width: "205", height: "109", "class": "d-inline-block align-top brand-logo", alt: "" });
var navbarBrand = React.createElement(
    "a",
    { "class": "navbar-brand", href: "#" },
    navbarBrandImage
);

function NavBarButton(props) {
    return React.createElement(
        "li",
        null,
        React.createElement(
            "a",
            { href: "#" },
            props.buttonName
        )
    );
}

function NavBarDropdownButtons(props) {
    var buttonsList = React.createElement(
        "ul",
        { "class": "dropdown-menu" },
        React.createElement(NavBarButton, { buttonName: "Diables" }),
        React.createElement(NavBarButton, { buttonName: "Tabalers" }),
        React.createElement(NavBarButton, { buttonName: "Histrions" }),
        React.createElement(NavBarButton, { buttonName: "Infantil" }),
        React.createElement(NavBarButton, { buttonName: "I+D" })
    );

    var mainButton = React.createElement(
        "a",
        { href: "#", "class": "dropdown-toggle", "data-toggle": "dropdown", role: "button", "aria-haspopup": "true", "aria-expanded": "false" },
        props.buttonName
    );
    var mainContainer = React.createElement(
        "li",
        { "class": "dropdown" },
        mainButton,
        buttonsList
    );
    return mainContainer;
}

function NavBarButtons() {

    var buttonsList = React.createElement(
        "ul",
        { "class": "nav navbar-nav" },
        React.createElement(NavBarButton, { buttonName: "El Correfoc de Manresa" }),
        React.createElement(NavBarDropdownButtons, { buttonName: "Seccions" }),
        React.createElement(NavBarButton, { buttonName: "Fes-te soci" }),
        React.createElement(NavBarButton, { buttonName: "Contacte" })
    );
    var mainContainer = React.createElement(
        "div",
        { "class": "collapse navbar-collapse", id: "sectionsNavBar" },
        buttonsList
    );
    return mainContainer;
}

function NavbarCreator() {
    var navbarHeader = React.createElement(
        "div",
        { "class": "navbar-header" },
        navbarBrand,
        navbarToggle
    );
    var mainContainer = React.createElement(
        "div",
        { "class": "container-fluid header-background navbar-fixed-top" },
        React.createElement(
            "div",
            { "class": "container header-background" },
            React.createElement(
                "nav",
                { "class": "navbar navbar-default" },
                navbarHeader,
                NavBarButtons()
            )
        )
    );

    return mainContainer;
}
ReactDOM.render(NavbarCreator(), document.getElementById('navbar'));