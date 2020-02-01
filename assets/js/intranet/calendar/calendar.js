import * as React from 'react';
import * as ReactDOM from 'react-dom';
import axios from 'axios';
import EventCalendarData from './event-calendar-data';

class EventCalendarCell extends React.Component {
    constructor(props) {
        super(props);

        this.handleDeleteCell = this.handleDeleteCell.bind(this);
    }

    handleDeleteCell(e, cellId) {
        e.preventDefault();

        console.log("handleDeleteCell");
        console.log(cellId);
        // cancel the previous request
        if (typeof this._deleteCellPetition != typeof undefined) {
            this._deleteCellPetition.cancel('Operation canceled due to new request.')
        }

        // save the new request for cancellation
        this._deleteCellPetition = axios.CancelToken.source();
        
        axios.post('/intranet/calendar/delete-event/'+ cellId,
            // cancel token used by axios
            { cancelToken: this._deleteCellPetition.token }
        )
        .then(response => {
            this.props.onUpdate();
        })
        .catch(error => {
            if (axios.isCancel(error)) {
            console.log('Request canceled', error);
            } else {
            console.log(error);
            }
        });
    }

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
                    <button type="button" className="btn btn-danger" onClick={(e) => this.handleDeleteCell(e, this.props.id) }><i className="fa fa-trash"></i></button>
                </td>
            </tr>
        );
    }
}

class IntranetCalendar extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            events: [],
            fetchingData: false
        };
    }

    componentDidMount() {
        this.fetchData();
    }

    componentWillUnmount() {
        this._petition.cancel('componentWillUnmount');
    }

    fetchData() {
        // cancel the previous request
        if (typeof this._petition != typeof undefined) {
          this._petition.cancel('Operation canceled due to new request.')
        }
    
        // save the new request for cancellation
        this._petition = axios.CancelToken.source();
        
        this.setState({
            fetchingData: true
        });

        axios.get('/intranet/calendar/get-events',
          // cancel token used by axios
          { cancelToken: this._petition.token }
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
                events: events,
                fetchingData: false
            });
        })
        .catch(error => {
            if (axios.isCancel(error)) {
                console.log('Request canceled', error);
            } else {
                console.log(error);
                this.setState({
                    fetchingData: false 
                });
            }

            
        });
      }

    fillTable() {
        let table = [];

        for (let i = 0; i < this.state.events.length; i++) {
            var event = this.state.events[i];
            table.push(
                <EventCalendarCell 
                    key={event.id} 
                    id={event.id} 
                    date={event.date} 
                    time={event.time} 
                    title={event.title} 
                    description={event.description} 
                    address={event.address} 
                    city={event.city}
                    onUpdate={this.fetchData.bind(this)}
                    />);
        }

        return table;
    }

    render() {
        let tableContent;
        let stateContent;
        if(this.state.fetchingData) {
            stateContent = <div className="spinner-border text-primary"></div>;
        }
        else if(this.state.events.length == 0) {
            stateContent = <p>No hi ha actes programats.</p>;
        }
        else {
            tableContent = this.fillTable();
        }

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
                        { tableContent }
                    </tbody>
                </table>
                { stateContent }
            </div>
        );
    }
}

ReactDOM.render(<IntranetCalendar />, document.getElementById('intranet-calendar'));