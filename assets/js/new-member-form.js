import * as React from 'react';
import * as ReactDOM from 'react-dom';

class Form extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            fullnameValue: '',
            emailValue: '',
            passwordValue: '',
            fullnameError: '',
            emailError: '',
            passwordError: '',
            successMessage: '',
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(e) {
        if(e.target.name === 'fullname') {
            this.setState({
                fullnameValue: e.target.value
            });
        }

        if(e.target.name === 'email') {
            this.setState({
                emailValue: e.target.value,
            });
        }
        
        if(e.target.name === 'password') {
            this.setState({
                passwordValue: e.target.value,
            });
        }        
    }

    handleSubmit(e) {
        e.preventDefault();

        $.ajax({
            url: 'http://127.0.0.1:8000/api/user',
            type: 'POST',
            data: {
                fullname: this.state.fullnameValue,
                email: this.state.emailValue,
                password: this.state.passwordValue
            },
            dataType: 'json',
            success: function(response) {
                this.setState({
                    fullnameError: response.fullnameError ? response.fullnameError : null,
                    emailError: response.emailError ? response.emailError : null,
                    passwordError: response.passwordError ? response.passwordError : null,
                    successMessage: response.success_message ? response.success_message : null,
                });
            }.bind(this),
            error: function(xhr) {
                console.log(`An error occured: ${xhr.status} ${xhr.statusText}`);
            }
        });
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <div id="member">
                    <div class="form-group">
                        <label class="required" for="member_name">Nom i cognoms</label>
                        <input id="member_name" class="form-control" type="text" name="fullname" required="required"/>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="required" for="member_nif">DNI</label>
                                <input id="member_nid" class="form-control" type="text" name="nif" required="required"/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="required" for="member_birthday">Data de naixement</label>
                                <input id="member_birthday" class="form-control" type="text" name="birthday" required="required"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="required" for="member_direction">Adreça*</label>
                        <input id="member_direction" class="form-control" type="text" name="direction" required="required"/>
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
                                <input id="member_phone" class="form-control" type="text" name="phone" required="required"/>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <div class="form-group">
                                <label class="required" for="member_email">Correu electrònic</label>
                                <input id="member_email" class="form-control" type="text" name="email" required="required"/>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-success btn-lg" type="submit" value="Enviar" />
                </div>
            </form>
            // <form onSubmit={this.handleSubmit}>
            //     <label htmlFor="fullname">Fullname</label>
            //     <input type="text" name='fullname' value={this.state.fullnameValue} onChange={this.handleChange} id="fullname" placeholder="Fullname" />
            //     <small>{this.state.fullnameError}</small>

            //     <label htmlFor="email">Email</label>
            //     <input type="email" name='email' value={this.state.emailValue} onChange={this.handleChange} id="email" placeholder="Email" />
            //     <small>{this.state.emailError}</small>
            
            //     <label htmlFor="password">Password</label>            
            //     <input type="password" name='password' value={this.state.passwordValue} onChange={this.handleChange} id="password" placeholder="Password" />
            //     <small>{this.state.passwordError}</small>            

            //     <button type="submit">Sign up</button>
            //     <span className='text-success'>{this.state.successMessage}</span>
            // </form>
        );
    }
}

ReactDOM.render(<Form />, document.getElementById('new-member-form'));