import getMonth from 'date-fns/getMonth';
import getDay from 'date-fns/getDay';
import getYear from 'date-fns/getYear';
import format from 'date-fns/fp/format'

export default class NewUser {
    constructor() {
        this.reset();
    }

    set name(value) {
        this._name =  value;
    }

    get name() {
        return this._name;
    }

    set nif(value) {
        this._nif = value;
    }

    get nif() {
        return this._nif;
    }

    set birthday(value) {
        this._birthday = value;
    }

    get birthday() {
        return this._birthday;
    }

    set address(value) {
        this._address = value;
    }

    get address() {
        return this._address;
    }

    set city(value) {
        this._city = value;
    }

    get city() {
        return this._city;
    }

    set zipcode(value) {
        this._zipcode = value;
    }

    get zipcode() {
        return this._zipcode;
    }

    set province(value) {
        this._province = value;
    }

    get province() {
        return this._province;
    }

    set phone(value) {
        this._phone = value;
    }

    get phone() {
        return this._phone;
    }

    set email(value) {
        this._email = value;
    }

    get email() {
        return this._email;
    }

    set correfocGroup(value) {
        this._correfocGroup = value;
    }

    get correfocGroup() {
        return this._correfocGroup;
    }

    set section(value) {
        this._section = value;
    }

    get section() {
        return this._section;
    }

    ////////////////////////
    /// ERROR MANAGEMENT ///
    ////////////////////////

    set nameError(value) {
        this._nameError = value;
    }

    get nameError() {
        return this._nameError;
    }

    set nifError(value) {
        this._nifError = value;
    }

    get nifError() {
        return this._nifError;
    }

    set birthdayError(value) {
        this._birthdayError = value;
    }

    get birthdayError() {
        return this._birthdayError;
    }

    set addressError(value) {
        this._addressError = value;
    }

    get addressError() {
        return this._addressError;
    }

    set cityError(value) {
        this._cityError = value;
    }

    get cityError() {
        return this._cityError;
    }

    set zipcodeError(value) {
        this._zipcodeError = value;
    }

    get zipcodeError() {
        return this._zipcodeError;
    }

    set provinceError(value) {
        this._provinceError = value;
    }

    get provinceError() {
        return this._provinceError;
    }

    set phoneError(value) {
        this._phoneError = value;
    }

    get phoneError() {
        return this._phoneError;
    }

    set emailError(value) {
        this._emailError;
    }

    get emailError() {
        return this._emailError;
    }

    set correfocGroupError(value) {
        this._correfocGroupError = value;
    }

    get sectionError() {
        return this._sectionError;
    }

    ////////////////////////
    /////// METHODS ////////
    ////////////////////////
    validate(response) {
        this.resetErrors();
        let errorsFound = false;

        if(response.nameError) {
            this._nameError = response.nameError;
            errorsFound = true;
        }

        if(response.nifError) {
            this._nifError = response.nifError;
            errorsFound = true;
        }

        if(response.birthdayError) {
            this._birthdayError = response.birthdayError;
            errorsFound = true;
        }

        if(response.addressError) {
            this._addressError = response.addressError;
            errorsFound = true;
        }

        if(response.cityError) {
            this._cityError = response.cityError;
            errorsFound = true;
        }

        if(response.zipcodeError) {
            this._zipcodeError = response.zipcodeError;
            errorsFound = true;
        }

        if(response.provinceError) {
            this._provinceError = response.provinceError;
            errorsFound = true;
        }

        if(response.phoneError) {
            this._phoneError = response.phoneError;
            errorsFound = true;
        }

        if(response.emailError) {
            this._emailError = response.emailError;
            errorsFound = true;
        }

        if(response.correfocGroupError) {
            this._correfocGroupError = response.correfocGroupError;
            errorsFound = true;
        }

        if(response.sectionError) {
            this._sectionError = response.sectionError;
            errorsFound = true;
        }

        return errorsFound;
    }

    serialize() {
        return {
            name: this._name,
            nif: this._nif, 
            birthday: this._birthday ? format('yyyy-MM-dd', this._birthday) : null,
            address: this._address,
            city: this._city,
            zipcode: this._zipcode,
            province: this._province,
            phone: this._phone,
            email: this._email,
            correfocGroup: this._correfocGroup,
            section: this._section
        };
    }

    isUnderaged() {
        var age = 18;
        var userDate = new Date();
        userDate.setFullYear(getYear(this._birthday), getMonth(this._birthday), getDay(this._birthday));

        var currentDate = new Date();
        currentDate.setFullYear(currentDate.getFullYear() - age);

        return (currentDate - userDate) <= 0;
    }

    reset() {
        this._name = null;
        this._nif = null;
        this._birthday = null;
        this._address = null;
        this._city = null;
        this._zipcode = null;
        this._province = null;
        this._phone = null;
        this._email = null;
        this._correfocGroup = 0;
        this._section = 0;

        this.resetErrors();
    }

    resetErrors() {
        this._nameError = null;
        this._nifError = null;
        this._birthdayError = null;
        this._addressError = null;
        this._cityError = null;
        this._zipcodeError = null;
        this._provinceError = null;
        this._phoneError = null;
        this._emailError = null;
        this._correfocGroupError = null;
        this._sectionError = null;
    }
}