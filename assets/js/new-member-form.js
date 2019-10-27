import * as React from 'react';
import * as ReactDOM from 'react-dom';
import DatePicker from "react-bootstrap-date-picker";

// var DatePicker = require("react-bootstrap-date-picker");

class Form extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            nameValue: '',
            dniValue: '',
            birthdayValue: '',
            addressValue: '',
            cityValue: '',
            zipcodeValue: '',
            provinceValue: '',
            phoneValue: '',
            emailValue: '',
            passwordValue: '',
            fullnameError: '',
            emailError: '',
            successMessage: '',
            value: new Date().toISOString()
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleDateChange = this.handleDateChange.bind(this)
    }

    handleChange(e) {
        if(e.target.name === 'fullname') {
            this.setState({
                fullnameValue: e.target.value
            });
        }

        if(e.target.name === 'dni') {
            this.setState({
                dniValue: e.target.value
            });
        }

        if(e.target.name === 'address') {
            this.setState({
                addressValue: e.target.value
            });
        }

        if(e.target.name === 'city') {
            this.setState({
                cityValue: e.target.value
            });
        }

        if(e.target.name === 'zipcode') {
            this.setState({
                zipcodeValue: e.target.value
            });
        }

        if(e.target.name === 'province') {
            this.setState({
                provinceValue: e.target.value
            });
        }

        if(e.target.name === 'phone') {
            this.setState({
                phoneValue : e.target.value,
            });
        }

        if(e.target.name === 'email') {
            this.setState({
                emailValue: e.target.value,
            });
        }
             
    }

    handleDateChange(value, formattedValue) {
        this.setState({
          value: value, // ISO String, ex: "2016-11-19T12:00:00.000Z"
          formattedValue: formattedValue // Formatted String, ex: "11/19/2016"
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

    renderBasicFormPart() {
        const months = ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Desembre'];
        const days = ['Dl', 'Dm', 'Dc', 'Dj', 'Dv', 'Ds', 'Dg'];

        return (
            <div id="basicFormPart">
                <div class="form-group">
                    <label class="required" for="member_name">Nom i cognoms</label>
                    <input id="member_name" class="form-control" type="text" name="fullname" required="required"/>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="required" for="member_dni">DNI</label>
                            <input id="member_dni" class="form-control" type="text" name="dni" required="required"/>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="required" for="member_birthday">Data de naixement</label>
                            <DatePicker id="example-datepicker" value={this.state.value} onChange={this.handleDateChange} monthLabels={months} dayLabels={days}/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="required" for="member_address">Adreça*</label>
                    <input id="member_address" class="form-control" type="text" name="address" required="required"/>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <div class="form-group">
                            <label class="required" for="member_city">Població</label>
                            <input id="member_city" class="form-control" type="text" name="city" required="required"/>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label class="required" for="member_zipcode">Codi postal</label>
                            <input id="member_zipcode" class="form-control" type="text" name="zipcode" required="required"/>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <div class="form-group">
                            <label class="required" for="member_province">Província</label>
                            <input id="member_province" class="form-control" type="text" name="province" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="required" for="member_phone">Telèfon</label>
                            <input id="member_phone" class="form-control" type="tel" name="phone" pattern="[6-9]{1}[0-9]{8}" required="required"/>
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <div class="form-group">
                            <label class="required" for="member_email">Correu electrònic</label>
                            <input id="member_email" class="form-control" type="email" name="email" required="required"/>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
    
    renderFormParentalPart() {
        return (
            <div id="paternForm">
                <h2>Formulari patern</h2>
                { this.renderBasicFormPart() }
            </div>
        );
    }

    render() {
        let parentalForm;
        parentalForm = <div id="empty"></div>;

        return (
            <form onSubmit={this.handleSubmit}>
                { this.renderBasicFormPart() }
                { parentalForm }
                <input class="btn btn-success btn-lg" type="submit" value="Enviar" />
            </form>
        );
    }
}

ReactDOM.render(<Form />, document.getElementById('new-member-form'));