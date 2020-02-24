import * as React from 'react';

export class EditButton extends React.Component {
    constructor(props) {
        super(props);

    }

    render() {
        let button;

        console.log(1);
        if(this.props.modalDataTarget) {
            console.log(2);
            button = <button type="button" className="btn btn-info" data-toggle="modal" data-target={this.props.modalDataTarget}><i className="fa fa-pencil"></i></button>
        }
        else if(this.props.handle) {
            console.log(3);
            button = <button type="button" className="btn btn-info" onClick={(e) => this.props.handle(e, this.props.id) }><i className="fa fa-pencil"></i></button>
        }
        console.log(4);

        return (
            <div className="d-inline p-1">
                { button }
                {/* <button type="button" className="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i className="fa fa-pencil"></i></button> */}
                {/* <button type="button" className="btn btn-info" onClick={(e) => this.props.handle(e, this.props.id) }><i className="fa fa-pencil"></i></button> */}
            </div>
        );
    }
}