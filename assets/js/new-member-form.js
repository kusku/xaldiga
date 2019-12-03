import * as React from 'react';
import * as ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import NewUser from './new-user';
import { DateUtils } from 'react-day-picker';
import DayPickerInput from 'react-day-picker/DayPickerInput';
import 'react-day-picker/lib/style.css';

import Form from 'react-bootstrap/Form';
import Col from 'react-bootstrap/Col';

const formType = {
    MEMBER: 0,
    PARENTAL_MEMBER: 1
}

import dateFnsFormat from 'date-fns/format';
import dateFnsParse from 'date-fns/parse';

function parseDate(str, format, locale) {
  const parsed = dateFnsParse(str, format, new Date(), { locale });
  if (DateUtils.isDate(parsed)) {
    return parsed;
  }
  return undefined;
}

function formatDate(date, format, locale) {
  return dateFnsFormat(date, format, { locale });
}

class NewMemberForm extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            users: [new NewUser(), new NewUser()]
        };

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
                case 'nif':
                    users[type].nif = value;
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
                case 'correfocGroup':
                    users[type].correfocGroup = value;
                    break;
                case 'section':
                    users[type].section = value;
                    break;
                default:
                    break;
            }
            
            return (users);
        });
    }

    handleDateChange(date, type) {
        const updatesUsers = this.state.users;
        updatesUsers[type].birthday = date;
        this.setState({
            users: updatesUsers
        });
    }

    handleSubmit(e) {
        e.preventDefault();

        console.log(this.state.users[0]);
        $.ajax({
            method: 'POST',
            url: '/new/user',
            data: {
                user: this.state.users[formType.MEMBER].serialize(),
                parentalUser: this.state.users[formType.PARENTAL_MEMBER].serialize()
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                const updatesUsers = this.state.users;
                updatesUsers[formType.MEMBER].validate(response.user);

                if(this.isUnderaged(formType.MEMBER)) {
                    updatesUsers[formType.PARENTAL_MEMBER].validate(response.parentalUser);
                }
                this.setState({
                    users: updatesUsers
                })
            }.bind(this),
            error: function(xhr) {
                console.log(`An error occured: ${xhr.status} ${xhr.statusText}`);
            }
        });
    }

    isAgeDefined(type) {
        if(this.state.users[type].birthday) {
            return true;
        }
        else{
            return false;
        }
    }

    isUnderaged(type) {
        if(!this.isAgeDefined(type)) {
            return false;
        }

        return this.state.users[type].isUnderaged();
    }

    renderErrorMessage(message) {
        return (
            <span className="invalid-feedback d-block">
                <span className="d-block">
                    <span className="form-error-icon badge badge-danger text-uppercase">Error</span>
                    <span className="form-error-message">{message}</span>
                </span>
            </span>
        );
    }

    renderFormPartWithoutError(name, label, type) {
        return(
            <Form.Group>
                <Form.Label htmlFor={name}>{label}</Form.Label>
                <Form.Control id={name} type="text" name={name} onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
            </Form.Group>
        );
    }

    renderFormPartWithError(name, label, type, error) {
        return(
            <Form.Group>
                <Form.Label htmlFor={name}>{label}
                </Form.Label>
                <Form.Control id={name} type="text" className="is-invalid" name={name} onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                {this.renderErrorMessage(error)}
            </Form.Group>
        );
    }

    renderFormPart(name, label, type, error) {
        if(error == null) {
            return this.renderFormPartWithoutError(name, label, type);
        }
        else {
            return this.renderFormPartWithError(name, label, type, error);
        }
    }

    renderDatePickerWithError(name, label, type, error) {
        return (
        <Form.Group>
            <Form.Label htmlFor={name}>{label}</Form.Label>
            <DayPickerInput className="is-invalid" formatDate={formatDate} format={'dd/MM/yyyy'} parseDate={parseDate} placeholder='dd/mm/aaaa'  onDayChange={date => this.handleDateChange(date, type)}/>
            {this.renderErrorMessage(error)}
        </Form.Group>
        );
    }

    renderDatePickerWithoutError(name, label, type) {
        return (
        <Form.Group>
            <Form.Label htmlFor={name}>{label}</Form.Label>
            <DayPickerInput formatDate={formatDate} format={'dd/MM/yyyy'} parseDate={parseDate} placeholder='dd/mm/aaaa'  onDayChange={date => this.handleDateChange(date, type)}/>
        </Form.Group>
        );
    }

    renderDatePicker(name, label, type, error) {
        if(error == null) {
            return this.renderDatePickerWithoutError(name, label, type);
        }
        else {
            return this.renderDatePickerWithError(name, label, type, error);
        }
    }

    renderBasicFormPart(type) {
        return (
            <div id="basicFormPart">
                <h3>Dades de soci</h3>
                {this.renderFormPart('fullname', 'Nom i cognoms', type, this.state.users[type].nameError) }
                <Form.Row>
                    <Col md={6}>
                        {this.renderFormPart('nif', 'DNI', type, this.state.users[type].nifError) }
                    </Col>
                    <Col md={6}>
                        {this.renderDatePicker('birthday', 'Data de Naixement', type, this.state.users[type].birthdayError)}
                    </Col>
                </Form.Row>
                {this.renderFormPart('address', 'Adreça', type, this.state.users[type].addressError) }
                <Form.Row>
                    <Col md={5}>
                        {this.renderFormPart('city', 'Població', type, this.state.users[type].cityError) }
                    </Col>
                    <Col md={2}>
                        {this.renderFormPart('zipcode', 'Codi Postal', type, this.state.users[type].zipcodeError) }
                    </Col>
                    <Col md={5}>
                        {this.renderFormPart('province', 'Província', type, this.state.users[type].provinceError) }
                    </Col>
                </Form.Row>
                <Form.Row>
                    <Col md={4}>
                        {this.renderFormPart('phone', 'Telèfon', type, this.state.users[type].phoneError, "[6-9]{1}[0-9]{8}") }
                    </Col>
                    <Col md={8}>
                        {this.renderFormPart('email', 'Correu Electrònic', type, this.state.users[type].emailError) }
                    </Col>
                </Form.Row>
            </div>
        );
    }
    
    renderFormParentalPart(type) {
        return (
            <div id="paternForm" className="mt-5 pt-5">
                <h2>Formulari patern</h2>
                <Form.Text className="text-muted">
                    Per a poder inscriure un menor d'edat a l'entitat, és necessari que el/la pare/mare/tutor/a s'inscrigui a l'entitat.
                </Form.Text>
                { this.renderBasicFormPart(type) }
            </div>
        );
    }

    renderUnderagedSections(type) {
        return (
            <div>
                <h3>Seccions</h3>
                <Form.Group>
                    <Form.Label>A quin grup Infantil vols formar part?</Form.Label>
                    <Form.Control as="select" id="correfocDropdown" name="section" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}>
                        <option value="4">Diablons</option>
                        <option value="5">Tabalons</option>
                    </Form.Control>
                </Form.Group>
            </div>
        );
    }

    renderAdultSections(type) {
        return (
            <div>
                <h3>Seccions</h3>
                <Form.Group>
                    <Form.Label>Vols participar al Correfoc de Manresa?</Form.Label>
                    <Form.Control as="select" id="correfocDropdown" name="correfocGroup" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}>
                        <option value="0">No vull participar</option>
                        <option value="1">SAC</option>
                        <option value="2">Tabalers</option>
                        <option value="3">Capgirells</option>
                        <option value="4">Moixogants</option>
                        <option value="5">Fogueres i Fogaines</option>
                        <option value="6">Asmodeu</option>
                        <option value="7">Drac</option>
                        <option value="8">Víbria</option>
                        <option value="9">Gàrgola</option>
                        <option value="10">Mulassa</option>
                        <option value="11">Nas de Sutja</option>
                        <option value="12">Coll-llarg</option>
                    </Form.Control>
                    <Form.Text className="text-muted">
                        El teu primer Correfoc estaràs al grup de SAC per tal de conèixer la festa des de dins.<br/>
                        Al primer any ja estaràs a la llista d'espera del grup seleccionat, on podràs formar-ne part, si hi ha places disponibles, a partir del segon Correfoc.
                    </Form.Text>
                </Form.Group>
                <Form.Group>
                    <Form.Label>T'agradaria formar part d'alguna secció durant l'any?</Form.Label>
                    <Form.Control as="select" id="sectionDropdown" name="section" onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}>
                        <option value="0">No vull participar</option>
                        <option value="1">Diables</option>
                        <option value="2">Histrions</option>
                        <option value="3">Tabalers</option>
                    </Form.Control>
                </Form.Group>
            </div>
          );
    }

    renderAgreement() {
        var link = <a href="/avis-legal" className="custom-link">Accepto la Política de Protecció de Dades de Xàldiga Taller de Festes</a>;
        return (
            <div key="custom-checkbox" className="mb-3">
                <Form.Check custom type="checkbox" id="custom-checkbox" label={link}/>
            </div>
        );
    }

    render() {
        const emptyDiv = <div id="empty"></div>;
        let parentalForm = emptyDiv;
        let userSectionsForm = emptyDiv;
        let parentalSectionsForm = emptyDiv;

        if(this.isAgeDefined(formType.MEMBER)) {
            if(!this.isUnderaged(formType.MEMBER)) { 
                userSectionsForm = this.renderAdultSections(formType.MEMBER);
            }
            else {
                userSectionsForm = this.renderUnderagedSections(formType.MEMBER);
                parentalForm = this.renderFormParentalPart(formType.PARENTAL_MEMBER);
                parentalSectionsForm = this.renderAdultSections(formType.PARENTAL_MEMBER); 
            }    
        }

        return (
            <div>
            <Form onSubmit={this.handleSubmit}>
                { this.renderBasicFormPart(formType.MEMBER) }
                { userSectionsForm }
                { parentalForm }
                { parentalSectionsForm }
                { this.renderAgreement() }
                <input className="btn btn-success btn-lg" type="submit" value="Enviar" />
            </Form>
            {/* <Button variant="primary">Primary</Button> */}
            </div>
        );
    }
}

ReactDOM.render(<NewMemberForm />, document.getElementById('new-member-form'));