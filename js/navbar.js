const navbarToggleLine = <span class="icon-bar"></span>;
const navbarToggle = <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sectionsNavBar">
    {navbarToggleLine}
    {navbarToggleLine}
    {navbarToggleLine}
</button>;

const navbarBrandImage = <img src="./images/logo3.png" width="205" height="109" class="d-inline-block align-top brand-logo" alt=""></img>;
const navbarBrand = <a class="navbar-brand" href="#">{navbarBrandImage}</a>;

function NavBarButton(props) {
    return <li><a href="#">{props.buttonName}</a></li>
}

function NavBarDropdownButtons(props) {
    const buttonsList = <ul class="dropdown-menu">
        <NavBarButton buttonName="Diables" />
        <NavBarButton buttonName="Tabalers" />
        <NavBarButton buttonName="Histrions" />
        <NavBarButton buttonName="Infantil" />
        <NavBarButton buttonName="I+D" />
    </ul>;

    const mainButton = <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{props.buttonName}</a>;
    const mainContainer = <li class="dropdown">{mainButton}{buttonsList}</li>;
    return mainContainer;
}

function NavBarButtons() {


    const buttonsList = <ul class="nav navbar-nav">
        <NavBarButton buttonName="El Correfoc de Manresa"/>
        <NavBarDropdownButtons buttonName="Seccions" />
        <NavBarButton buttonName="Fes-te soci"/>
        <NavBarButton buttonName="Contacte"/>
    </ul>;
    const mainContainer = <div class="collapse navbar-collapse" id="sectionsNavBar">{buttonsList}</div>;
    return mainContainer;
}

function NavbarCreator() {
    const navbarHeader = <div class="navbar-header">{navbarBrand}{navbarToggle}</div>;
    const mainContainer = 
        <div class="container-fluid header-background navbar-fixed-top">
            <div class="container header-background">
                <nav class="navbar navbar-default">
                    {navbarHeader}
                    {NavBarButtons()}
                </nav>
            </div>
        </div>;

    return mainContainer;
}
ReactDOM.render(
    NavbarCreator(),
    document.getElementById('navbar')
);