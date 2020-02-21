import * as React from 'react';
import axios from 'axios';
import { DeleteButton } from '../components/delete-button';
import { EditButton } from '../components/edit-button';

export class IntranetCalendarCell extends React.Component {
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
                    <div className="form-group">
                        <EditButton></EditButton>
                        <DeleteButton id={this.props.id} handle={this.handleDeleteCell}></DeleteButton>
                    </div>
                </td>
            </tr>
        );
    }
}