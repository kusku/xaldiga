import getMonth from 'date-fns/getMonth';
import getDay from 'date-fns/getDay';
import getYear from 'date-fns/getYear';

export default class NewUser {
    constructor() {
        this.correfocGroup = 0;
        this.section = 0;
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

    ////////////////////////
    /////// METHODS ////////
    ////////////////////////
    validate(response) {
        this._nameError = response.nameError ? response.nameError : null;
        this._nifError = response.nifError ? response.nifError : null;
        this._addressError = response.addressError ? response.addressError : null;
        this._cityError = response.cityError ? response.cityError : null;
        this._zipcodeError = response.zipcodeError ? response.zipcodeError : null;
        this._provinceError = response.provinceError ? response.provinceError : null;
        this._phoneError = response.phoneError ? response.phoneError : null;
        this._emailError = response.emailError ? response.emailError : null;
        this._correfocGroup = response.correfocGroup ? response.correfocGroup : null;
        this._section = response.section ? response.section : null;
    }

    serialize() {
        return {
            name: this._name,
            nif: this._nif, 
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
}