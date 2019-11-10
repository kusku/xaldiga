export default class User {
    constructor() {
        this._timestampBirthday = new Date().toISOString();
    }

    set name(value) {
        this._name =  value;
    }

    get name() {
        return this._name;
    }

    set dni(value) {
        this._dni = value;
    }

    get dni() {
        return this._dni;
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

    set timestampBirthday(value) {
        return this._timestampBirthday = value;
    }

    get timestampBirthday() {
        return this._timestampBirthday;
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
}