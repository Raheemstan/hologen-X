import logo from './logo.svg';
import './App.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCheckCircle } from '@fortawesome/free-regular-svg-icons';
import { useState } from 'react';

import axios from 'axios';

function App() {
  const [status, setstatus] = useState(0)
  setTimeout(() => {
    setstatus(1)
  }, 3000);
  return (
    <div className="App">
      <div className='box'>
          <div className='first'>
                <h1>PhoenixMFA</h1>
                {
                  status === 0 ? <h1>2:00m</h1> : ''
                }
                
              </div>
          {
            status === 0 ?
            <div className='body'>
              
              <p>Send this code</p>
              <div className='pin'>
                877 845
              </div>
              <p>to</p>
              <div className='number'>66577</div>
          </div>
          :
          <div className='body'>
              <div className='fawes'>
                <FontAwesomeIcon icon={faCheckCircle} />
              </div>
              <p>Successfully Verified</p>
          </div>
          }
      </div>
    </div>
  );
}

export default App;
