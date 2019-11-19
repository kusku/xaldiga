import * as React from 'react';
import * as ReactDOM from 'react-dom';
import User from './user';
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
import getMonth from 'date-fns/getMonth';
import getDay from 'date-fns/getDay';
import getYear from 'date-fns/getYear';

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
            users: [new User(), new User()]
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
        
        console.log(this.state.users);
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

        console.log(JSON.stringify(this.state.users[0]));
        $.ajax({
            method: 'POST',
            url: '/new/user',
            data: {
                name: this.state.users[0].name
            },
            dataType: 'json',
            success: function(response) {
                const updatesUsers = this.state.users;
                updatesUsers[0].nameError = response.nameError ? response.nameError : null;
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

        var age = 18;
        var birthday = this.state.users[type].birthday;

        var userDate = new Date();
        userDate.setFullYear(getYear(birthday), getMonth(birthday), getDay(birthday));
        
        var currdate = new Date();
        currdate.setFullYear(currdate.getFullYear() - age);

        if ((currdate - userDate) > 0) {
            return false;
        }

        return true;
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

    renderFormPartWithoutError(name, label, type, pattern) {
        return(
            <Form.Group>
                <Form.Label htmlFor={name}>{label}</Form.Label>
                <Form.Control id={name} type="text" name={name} pattern={pattern} required onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
            </Form.Group>
        );
    }

    renderFormPartWithError(name, label, type, pattern, error) {
        return(
            <Form.Group>
                <Form.Label htmlFor={name}>{label}
                    {this.renderErrorMessage(error)}
                </Form.Label>
                <Form.Control id={name} type="text" name={name} pattern={pattern} required onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
            </Form.Group>
        );
    }

    renderFormPart(name, label, type, error, pattern=".") {
        if(error == null) {
            return this.renderFormPartWithoutError(name, label, type, pattern);
        }
        else {
            return this.renderFormPartWithError(name, label, type, pattern, error);
        }
    }

    renderBasicFormPart(type) {
        const months = ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Desembre'];
        const days = ['Dl', 'Dm', 'Dc', 'Dj', 'Dv', 'Ds', 'Dg'];

        return (
            <div id="basicFormPart">
                <h3>Dades de soci</h3>
                {this.renderFormPart('fullname', 'Nom i cognoms', type, this.state.users[type].nameError) }
                <Form.Row>
                    <Col md={6}>
                        {this.renderFormPart('dni', 'DNI', type, this.state.users[type].dniError) }
                    </Col>
                    <Col md={6}>
                        <Form.Group>
                            <Form.Label htmlFor="member_birthday">Data de naixement</Form.Label>
                            <DayPickerInput formatDate={formatDate} format={'MM/dd/yyyy'} parseDate={parseDate} placeholder={`${dateFnsFormat(new Date(), 'MM/dd/yyyy')}`}  onDayChange={date => this.handleDateChange(date, type)}/>
                        </Form.Group>
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
                        {/* <Form.Group>
                            <Form.Label htmlFor="member_phone">Telèfon</Form.Label>
                            <Form.Control id="member_phone" type="tel" name="phone" pattern="[6-9]{1}[0-9]{8}"  onChange={(e) => this.handleChange(e.target.name, e.target.value, type)}/>
                        </Form.Group> */}
                        {this.renderFormPart('phone', 'Telèfon', type, this.state.users[type].phoneError, "[6-9]{1}[0-9]{8}") }
                    </Col>
                    <Col md={8}>
                        {this.renderFormPart('email', 'Correu Electrònica', type, this.state.users[type].emailError) }
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
        return (
            <div>
            <Form>
            {['checkbox', 'radio'].map(type => (
                <div key={`default-${type}`} className="mb-3">
                <Form.Check 
                    type={type}
                    id={`default-${type}`}
                    label={`default ${type}`}
                />

                <Form.Check
                    disabled
                    type={type}
                    label={`disabled ${type}`}
                    id={`disabled-default-${type}`}
                />
                </div>
            ))}
            </Form>
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
                <input className="btn btn-success btn-lg" type="submit" value="Enviar" />
            </Form>
            {/* { this.renderAgreement() } */}
            {/* <Button variant="primary">Primary</Button> */}
            </div>
        );
    }
}

ReactDOM.render(<NewMemberForm />, document.getElementById('new-member-form'));