import * as React from 'react';
import axios from 'axios';
import { IntranetCalendarForm } from './calendar-form';
import { DeleteButton } from '../components/delete-button';
import { EditButton } from '../components/edit-button';

export class IntranetCalendarCell extends React.Component {
    constructor(props) {
        super(props);

        this.handleEditCell = this.handleEditCell.bind(this);
        this.handleDeleteCell = this.handleDeleteCell.bind(this);
    }

    handleEditCell(e, cellId) {
        e.preventDefault();

        // cancel the previous request
        if (typeof this._editCellPetition != typeof undefined) {
            this._editCellPetition.cancel('Operation canceled due to new request.')
        }

        // save the new request for cancellation
        this._editCellPetition = axios.CancelToken.source();

        axios.post('/intranet/calendar/edit-event/' + cellId,
            // cancel token used by axios
            { cancelToken: this._editCellPetition.token }
        )
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.log(error);
        });
    }

    handleDeleteCell(e, cellId) {
        e.preventDefault();

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
        var modalDataTargetTemplate = "intranetCalendarFormModal_";
        let modalDataTargetName = modalDataTargetTemplate.concat(this.props.id);

        return (
            <tr>
                <td>{this.props.date}</td>
                <td>{this.props.title}</td>
                <td>{this.props.time}</td>
                <td>{this.props.address}</td>
                <td>{this.props.city}</td>
                <td>{this.props.description}</td>
                <td>
                    <div className="form-group">
                        <EditButton id={this.props.id} title={this.props.title} modalDataTarget={"#".concat(modalDataTargetName)}></EditButton>
                        <DeleteButton id={this.props.id} handle={this.handleDeleteCell}></DeleteButton>
                        <IntranetCalendarForm 
                            modalDataTarget={modalDataTargetName} 
                            date={this.props.date} 
                            time={this.props.time} 
                            title={this.props.title} 
                            description={this.props.description} 
                            address={this.props.address} 
                            city={this.props.city}
                        />
                    </div>
                </td>
            </tr>
        );
    }
}