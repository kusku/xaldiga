import * as React from 'react';
import * as ReactDOM from 'react-dom';
import axios from 'axios';
import EventCalendarData from './event-calendar-data';

class EventCalendarCell extends React.Component {
    render() {
        return (
            <tr>
                <td>{this.props.date}</td>
                <td>{this.props.title}</td>
                <td>{this.props.time}</td>
                <td>{this.props.address}</td>
                <td>{this.props.city}</td>
                <td>{this.props.description}</td>
                <td>
                    <button type="button" className="btn btn-info"><i className="fa fa-pencil"></i></button>
                    <button type="button" className="btn btn-danger"><i className="fa fa-trash"></i></button>
                </td>
            </tr>
        );
    }
}

class IntranetCalendar extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            events: []
        };
    }

    componentDidMount() {
        this.fetchData();
    }

    componentWillUnmount() {
        this._source.cancel('componentWillUnmount');
    }

    fetchData() {
        // cancel the previous request
        if (typeof this._source != typeof undefined) {
          this._source.cancel('Operation canceled due to new request.')
        }
    
        // save the new request for cancellation
        this._source = axios.CancelToken.source();
        
        axios.get('/intranet/calendar/get-events',
          // cancel token used by axios
          { cancelToken: this._source.token }
        )
        .then(response => {
            let data = response.data;
            let events = [];
            for (let i = 0; i < data.events.length; i++) {
                event = new EventCalendarData();
                event.fill(data.events[i]);
                events.push(event);
            } 

            this.setState({
                events: events
            });
        })
        .catch(error => {
            if (axios.isCancel(error)) {
            console.log('Request canceled', error);
            } else {
            console.log(error);
            }
        });
      }

    fillTable() {
        let table = [];

        for (let i = 0; i < this.state.events.length; i++) {
            var event = this.state.events[i];
            table.push(<EventCalendarCell key={event.id} id={event.id} date={event.date} time={event.time} title={event.title} description={event.description} address={event.address} city={event.city}/>);
        }

        return table;
    }

    render() {
        return(
            <div className="table-responsive">
                <table className="table">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Títol</th>
                        <th>Hora</th>
                        <th>Ubicació</th>
                        <th>Ciutat</th>
                        <th>Descrpició</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        {this.fillTable() }
                    </tbody>
                </table>
            </div>
        );
    }
}

ReactDOM.render(<IntranetCalendar />, document.getElementById('intranet-calendar'));