import * as React from 'react';

export class DeleteButton extends React.Component {
    constructor(props) {
        super(props);
    }

    onDeleteClicked(e) {
        $('#deleteButtonModal').modal('hide');
        this.props.handle(e, this.props.id);
    }

    render() {
        return (
            <div className="d-inline p-1">
                <button type="button" className="btn btn-danger" data-toggle="modal" data-target="#deleteButtonModal" ><i className="fa fa-trash"></i></button>

                <div className="modal fade" id="deleteButtonModal" tabIndex="-1" role="dialog" aria-labelledby="deleteButtonModalTitle" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered" role="document">
                        <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="deleteButtonModalTitle">Segur que vols eliminar l'esdeveniment?</h5>
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div className="modal-body">Un cop eliminat, no es podrà recuperar l'esdeveniment.</div>
                            <div className="modal-footer">
                                <button className="btn btn-secondary" data-dismiss="modal">Cancel·la</button>
                                <button className="btn btn-primary" onClick={(e) => this.onDeleteClicked(e) }>Elimina</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}