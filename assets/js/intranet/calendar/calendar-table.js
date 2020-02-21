import * as React from 'react';
import * as ReactDOM from 'react-dom';
import axios from 'axios';
import IntranetCalendarData from './calendar-data';
import { IntranetCalendarCell } from './calendar-cell';

class IntranetCalendarTable extends React.Component {
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
                event = new IntranetCalendarData();
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
                <IntranetCalendarCell 
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

ReactDOM.render(<IntranetCalendarTable />, document.getElementById('intranet-calendar-table'));