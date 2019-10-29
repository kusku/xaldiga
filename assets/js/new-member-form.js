import * as React from 'react';
import * as ReactDOM from 'react-dom';
import DatePicker from "react-bootstrap-date-picker";
import User from './user';

// var DatePicker = require("react-bootstrap-date-picker");

const formType = {
    MEMBER: 0,
    PARENTAL_MEMBER: 1
}

class Form extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            users: [new User(), new User()]
        };

        // this.state = {
        //     nameValue: '',
        //     dniValue: '',
        //     birthdayValue: '',
        //     addressValue: '',
        //     cityValue: '',
        //     zipcodeValue: '',
        //     provinceValue: '',
        //     phoneValue: '',
        //     emailValue: '',
        //     passwordValue: '',
        //     fullnameError: '',
        //     emailError: '',
        //     successMessage: '',
        //     value: new Date().toISOString()
        // };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleDateChange = this.handleDateChange.bind(this)
    }

    handleChange(name, value, type) {
        this.setState(state => {
            const users = state.users;

            switch(name) {
                case 'fullname':
                    users[type].name = value;
                    break;
                case 'dni':
                    users[type].dni = value;
                    break;
                case 'address':
                    users[type].address = value;
                    break;
                case 'city':
                    users[type].city = value;
                    break;
                case 'zipcode':
                    users[type].zipcode = value;
                    break;
                case 'province':
                    users[type].province = value;
                    break;
                case 'phone':
                    users[type].phone = value;
                    break;
                case 'email':
                    users[type].email = value;
                    break;
                default:
                    break;
            }
            
            return (users);
        });
        
        console.log(this.state.users);
    }

    handleDateChange(value, formattedValue, type) {
        const updatesUsers = this.state.users;
        updatesUsers[type].birthday = formattedValue;
        updatesUsers[type].timestampBirthday = value;

        this.setState({
            users: updatesUsers
        });
    }

    handleSubmit(e) {
        e.preventDefault();

        $.ajax({
            url: 'http://127.0.0.1:8000/api/user',
            type: 'POST',
            data: {
                fullname: this.state.fullnameValue,
                email: this.state.emailValue,
            },
            dataType: 'json',
            success: function(response) {
                this.setState({
                    fullnameError: response.fullnameError ? response.fullnameError : null,
                    emailError: response.emailError ? response.emailError : null,
                    successMessage: response.success_message ? response.success_message : null,
                });
            }.bind(this),
            error: function(xhr) {
                console.log(`An error occured: ${xhr.status} ${xhr.statusText}`);
            }
        });
    }

    isUnderaged(type) {
        if(!this.state.users[type].birthday)
        {
            return false;
        }

        var age = 18;
        var birthday = this.state.users[type].birthday.split("/"); // [day, month, year]

        var userDate = new Date();
        userDate.setFullYear(birthday[2], birthday[1]-1, birthday[0]);
        
        var currdate = new Date();
        currdate.setFullYear(currdate.getFullYear() - age);

        if ((currdate - userDate) > 0) {
            return false;
        }

        return true;
    }

    renderBasicFormPart(type) {
        const months = ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Desembre'];
        const days = ['Dl', 'Dm', 'Dc', 'Dj', 'Dv', 'Ds', 'Dg'];

        return (
            <div id="basicFormPart">
                <div className="form-group">
                    <label className="required" htmlFor="member_name">Nom i cognoms</label>
                    <input id="member_name" className="form-control" type="text" name="fullname" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                </div>
                <div className="form-row">
                    <div className="form-group col-md-6">
                        <div className="form-group">
                            <label className="required" htmlFor="member_dni">DNI</label>
                            <input id="member_dni" className="form-control" type="text" name="dni" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                        </div>
                    </div>
                    <div className="form-group col-md-6">
                        <div className="form-group">
                            <label className="required" htmlFor="member_birthday">Data de naixement</label>
                            <DatePicker id="member_datepicker" value={this.state.users[type].timestampBirthday} onChange={(v, fv) => this.handleDateChange(v, fv, type)} monthLabels={months} dayLabels={days} showClearButton={false}/>
                        </div>
                    </div>
                </div>
                <div className="form-group">
                    <label className="required" htmlFor="member_address">Adreça</label>
                    <input id="member_address" className="form-control" type="text" name="address" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                </div>
                <div className="form-row">
                    <div className="form-group col-md-5">
                        <div className="form-group">
                            <label className="required" htmlFor="member_city">Població</label>
                            <input id="member_city" className="form-control" type="text" name="city" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                        </div>
                    </div>
                    <div className="form-group col-md-2">
                        <div className="form-group">
                            <label className="required" htmlFor="member_zipcode">Codi postal</label>
                            <input id="member_zipcode" className="form-control" type="text" name="zipcode" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                        </div>
                    </div>
                    <div className="form-group col-md-5">
                        <div className="form-group">
                            <label className="required" htmlFor="member_province">Província</label>
                            <input id="member_province" className="form-control" type="text" name="province" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                        </div>
                    </div>
                </div>
                <div className="form-row">
                    <div className="form-group col-md-4">
                        <div className="form-group">
                            <label className="required" htmlFor="member_phone">Telèfon</label>
                            <input id="member_phone" className="form-control" type="tel" name="phone" pattern="[6-9]{1}[0-9]{8}" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                        </div>
                    </div>
                    <div className="form-group col-md-8">
                        <div className="form-group">
                            <label className="required" htmlFor="member_email">Correu electrònic</label>
                            <input id="member_email" className="form-control" type="email" name="email" required="required" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
    
    renderFormParentalPart(type) {
        return (
            <div id="paternForm">
                <h2>Formulari patern</h2>
                { this.renderBasicFormPart(type) }
            </div>
        );
    }

    render() {
        let parentalForm;
        if(this.isUnderaged(formType.MEMBER)) {
            parentalForm = this.renderFormParentalPart(formType.PARENTAL_MEMBER);
        }
        else {
            parentalForm = <div id="empty"></div>;
        }

        return (
            <form onSubmit={this.handleSubmit}>
                { this.renderBasicFormPart(formType.MEMBER) }
                { parentalForm }
                <input className="btn btn-success btn-lg" type="submit" value="Enviar" />
            </form>
        );
    }
}

ReactDOM.render(<Form />, document.getElementById('new-member-form'));