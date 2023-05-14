class Square extends React.Component {
  render() {
    return (<button className="square" onClick={() => this.props.onClick()}>{this.props.value}</button>);
  }
}

class Board extends React.Component {
  constructor(props){
    super(props);
    this.state={
        squares: Array(9).fill(null),
        currentSign : 'X',
		    winner : false,
        
    };
  }
  renderSquare(i) {
    return <Square onClick = {() => this.changeSquare(i)} value = {this.state.squares[i]}/>;
  }
  changeSquare(gf){
    if(calculateWinner(this.state.squares) == false && this.state.squares[gf]==null){
      var squares =this.state.squares;
      squares[gf] = this.state.currentSign;
      var current ='X';
      if(this.state.currentSign === 'X'){
        current ='O';
      }
      this.setState({squares :  squares , currentSign : current });
     }
    
  }
  render() {
	let status;
	if(! this.state.winner && calculateWinner(this.state.squares)){
	  var current ='X';
      if(this.state.currentSign === 'X'){
        current ='O';
      }
      this.setState({currentSign : current , winner : true });
	}
	if(this.state.winner){
		status = 'Winner: '+ this.state.currentSign;
	}
	else{
		status = 'Next player: '+ this.state.currentSign;
	}
    return (
      <div>
        <div className="status">{status}</div>
        <div className="board-row">
          {this.renderSquare(0)}
          {this.renderSquare(1)}
          {this.renderSquare(2)}
        </div>
        <div className="board-row">
          {this.renderSquare(3)}
          {this.renderSquare(4)}
          {this.renderSquare(5)}
        </div>
        <div className="board-row">
          {this.renderSquare(6)}
          {this.renderSquare(7)}
          {this.renderSquare(8)}
        </div>
      </div>
    );
  }
}

class Game extends React.Component {
  render() {
    return (
      <div className="game">
        <div className="game-board">
          <Board />
        </div>
        <div className="game-info">
          <div>{/* status */}</div>
          <ol>{/* TODO */}</ol>
        </div>
      </div>
    );
  }
}
function calculateWinner(squares) {
  const lines = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];
  for (let i = 0; i < lines.length; i++) {
    const [a, b, c] = lines[i];
    if (squares[a] != null && ( squares[a] == squares[b] && squares[a] == squares[c]  ) ) {
      return true;
    }
  }
  return false;
}

// ========================================
ReactDOM.render(<Game name="Game" />,document.getElementById('app'));
document.getElementById.innerHTML+="script run";

