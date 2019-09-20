import * as React from 'react';
import * as ReactDOM from 'react-dom';

class App extends React.Component {
    constructor(props) {
        super(props)
        this.state ={
        // Set your state here
        }
    }

    static getDerivedStateFromError(error) {
        // Update state so the next render will show the fallback UI.
        return { hasError: true };
      }
    
      componentDidCatch(error, errorInfo) {
        // You can also log the error to an error reporting service
        logErrorToMyService(error, errorInfo);
      }

  render() {
    if (this.state.hasError) {
        // You can render any custom fallback UI
        return <h1>Something went wrong.</h1>;
      }
  return <table>
    <tbody>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Age</th>
    </tr>
    </tbody>
  </table>
  }
}

ReactDOM.render(<App />, document.getElementById('employee-list'));