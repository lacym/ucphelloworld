const colorArr = [
	"red",
	"blue",
	"green",
	"orange",
	"purple",
	"cyan",
	"brown",
	"yellow",
	"lightblue",
];

class HelloWorld extends React.Component {
	constructor(props) {
		super(props);

		this.state = {
			color: "hotpink"
		};
	}

	//Before
	componentDidMount() {
		let colorPos = 0;
		console.log('did mount');
		setInterval(() => {
			if (colorArr.length - 1 > colorPos) {
				this.setState({
					color: colorArr[colorPos]
				});
				colorPos++;
			} else {
				this.setState({
					color: colorArr[colorPos]
				});
				colorPos = 0;
			}
		}, 700);
	}

	toggleColor() {
		if (this.state.color === "hotpink") {
			this.setState({
				color: "yellow"
			});
		} else {
			this.setState({
				color: "hotpink"
			});
		}

	}

	changeColor(event) {
		this.setState({
			color: event.target.value,
		});
	}

	render() {
		console.log(this.state.color);
		console.log(this.props.name);

		const styleObj = {
			backgroundColor: this.state.color, //"red",
			fontSize: 64 / 2,
		};

		return (
			<section style={styleObj} id="hello-world">
        <h2 className="pink">Hello {this.props.name}!</h2>
        <h2 onClick={this.toggleColor.bind(this)}>{this.state.color}</h2>
        <input value={this.state.color} onChange={this.changeColor.bind(this)}/>
      </section>
		);
	}
}

//https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-post-body.widget-added
$(document).on("post-body.widget-added", function(event, widget_id, dashboard_id) {
	if($(".grid-stack-item[data-id="+widget_id+"]").data('widget_type_id') == 'reactjs' && $(".grid-stack-item[data-id="+widget_id+"]").data('rawname') == 'ucphelloworld') {
		ReactDOM.render(<HelloWorld name="Bryan"/>, $(".grid-stack-item[data-id="+widget_id+"][data-widget_type_id=reactjs][data-rawname=ucphelloworld] .widget-content")[0]);
	}
});

//https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-post-body.widget-removed
$(document).on("post-body.widget-removed", function(event, widget, dashboard_id) {
	if(widget.data('widget_type_id') == 'reactjs' && widget.data('rawname') == 'ucphelloworld') {
		ReactDOM.unmountComponentAtNode(widget.find(".widget-content")[0]);
	}
});
