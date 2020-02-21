export default class IntranetCalendarData {
    constructor() {
       this.reset(); 
    }

    set id(value) {
        this._id = value;
    }

    get id() {
        return this._id;
    }

    set date(value) {
        this._date = value;
    }

    get date() {
        return this._date;
    }

    set time(value) {
        this._time = value;
    }

    get time() {
        return this._time;
    }

    set title(value) {
        this._title = value;
    }

    get title() {
        return this._title;
    }

    set description(value) {
        this._description = value;
    }

    get description() {
        return this._description;
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

    reset() {
        this._id = null;
        this._date = null;
        this._time = null;
        this._title = null;
        this._description = null;
        this._address = null;
        this._city = null;
    }

    fill(data) {
        this._id = data.id;
        this._date = data.date;
        this._time = data.time;
        this._title = data.title;
        this._description = data.description;
        this._address = data.address;
        this._city = data.city;
    }
}

