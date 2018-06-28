import React, { Component } from 'react';
import { withStyles } from '@material-ui/core/styles';
import TextField from '@material-ui/core/TextField';
import Card from '@material-ui/core/Card';
import CardContent from '@material-ui/core/CardContent';
import PropTypes from 'prop-types';

const styles = theme => ({
  container: {
    display: 'flex',
    flexWrap: 'wrap'
  },
  root: {
    display: 'flex',
    flexWrap: 'wrap',
    justifyContent: 'space-around',
    overflow: 'hidden',
    backgroundColor: theme.palette.background.paper,
    minHeight: 400,
    padding: 20
  },
  textField: {
    marginLeft: theme.spacing.unit,
    marginRight: theme.spacing.unit,
    width: 200
  },
  menu: {
    width: 200
  }
});

class Form extends Component {
  constructor(props) {
    super(props);
    this.state = {};
  }
  render() {
    const { classes } = this.props;
    return (
      <div className={classes.root}>
        <Card>
          <CardContent>
            <h2>Contact Form</h2>
            <form className={classes.container} noValidate>
              <TextField
                id="name"
                label="Name"
                className={classes.textField}
                margin="normal"
              />
              <br />

              <TextField
                id="email"
                label="Email"
                type="email"
                className={classes.textField}
                margin="normal"
              />
              <br />

              <TextField
                id="message"
                label="Name"
                className={classes.textField}
                margin="normal"
              />
            </form>
          </CardContent>
        </Card>
      </div>
    );
  }
}

Form.propTypes = {
  classes: PropTypes.object.isRequired
};
export default withStyles(styles)(Form);
