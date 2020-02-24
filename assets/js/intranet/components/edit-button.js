import * as React from 'react';

export class EditButton extends React.Component {
    constructor(props) {
        super(props);

    }

    render() {
        let button;

        if(this.props.modalDataTarget) {
            button = <button type="button" className="btn btn-info" data-toggle="modal" data-target={this.props.modalDataTarget}><i className="fa fa-pencil"></i></button>
        }
        else if(this.props.handle) {
            button = <button type="button" className="btn btn-info" onClick={(e) => this.props.handle(e, this.props.id) }><i className="fa fa-pencil"></i></button>
        }

        return (
            <div className="d-inline p-1">
                { button }
            </div>
        );
    }
}