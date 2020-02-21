import * as React from 'react';

export class EditButton extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="d-inline p-1">
                <button type="button" className="btn btn-info" onClick={(e) => this.props.handle(e, this.props.id) }><i className="fa fa-pencil"></i></button>
            </div>
        );
    }
}