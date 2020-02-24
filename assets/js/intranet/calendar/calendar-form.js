import * as React from 'react';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import { DateUtils } from 'react-day-picker';
import DayPickerInput from 'react-day-picker/DayPickerInput';
import 'react-day-picker/lib/style.css';
import dateFnsFormat from 'date-fns/format';
import dateFnsParse from 'date-fns/parse';

function parseDate(str, format, locale) {
    const parsed = dateFnsParse(str, format, new Date(), { locale });
    if (DateUtils.isDate(parsed)) {
      return parsed;
    }
    return undefined;
  }

function formatDate(date, format, locale) {
    return dateFnsFormat(date, format, { locale });
  }

export class IntranetCalendarForm extends React.Component {

    render() {
        return(
            <div className="modal fade" id="intranetCalendarFormModal" tabIndex="-1" role="dialog" aria-labelledby="intranetCalendarFormModalLabel" aria-hidden="true">
                <div className="modal-dialog modal-dialog-centered" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title" id="intranetCalendarFormModalLabel">Editar Esdeveniment</h5>
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            <Form onSubmit = {this.handle}>
                                <Form.Group>
                                    <Form.Label>Títol de l'acte</Form.Label>
                                    <Form.Control type="text" />
                                </Form.Group>
                                <Form.Group>
                                    <Form.Label>Data</Form.Label>
                                    <DayPickerInput formatDate={formatDate} format={'dd/MM/yyyy'} parseDate={parseDate} placeholder='dd/mm/aaaa' 
                                        inputProps={
                                            {   required: true
                                            }
                                        } 
                                    />
                                </Form.Group>
                                <Form.Group>
                                    <Form.Label>Adreça</Form.Label>
                                    <Form.Control type="text" />
                                </Form.Group>
                                <Form.Group>
                                    <Form.Label>Població</Form.Label>
                                    <Form.Control type="text" />
                                </Form.Group>
                                <Form.Group>
                                    <Form.Label>Descripció</Form.Label>
                                    <Form.Control type="text" as="textarea" />
                                </Form.Group>
                            </Form>
                        </div>
                        <div className="modal-footer">
                            <Button variant="primary" size="lg" type="submit">Guardar</Button>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}