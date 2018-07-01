import React, { Component } from 'react';
import { withStyles } from '@material-ui/core/styles';
import PropTypes from 'prop-types';
import TextField from '@material-ui/core/TextField';
import Card from '@material-ui/core/Card';
import CardContent from '@material-ui/core/CardContent';
import { Button, FormHelperText } from '@material-ui/core';
import axios from 'axios';

const styles = theme => ({
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
  },
  red: {
    color: 'red'
  }
});

class Form extends Component {
  constructor(props) {
    super(props);
    this.state = {
      form: {
        name: '',
        email: '',
        message: ''
      },
      errors: {}
    };
  }

  onChange = e => {
    // change states value based on key from the form
    this.setState({
      form: {
        [e.target.name]: e.target.value
      }
    });
  };

  handleSubmit = event => {
    event.preventDefault();
    const url = '/api/entries';
    const { form } = this.state;
    axios
      .post(url, form)
      .then(results => results)
      .catch(error => {
        const response = error.response.data;
        this.setState({
          errors: response
        });
      });
  };
  render() {
    const { classes } = this.props;
    const { form, errors } = this.state;
    return (
      <div className={classes.root}>
        <Card>
          <CardContent>
            <h2>Contact Form</h2>
            <form noValidate onSubmit={this.handleSubmit}>
              <TextField
                id="name"
                label="Name"
                className={classes.textField}
                margin="normal"
                name="name"
                onChange={this.onChange}
              />
              {errors.name && (
                <FormHelperText className={classes.red}>
                  {errors.name}
                </FormHelperText>
              )}
              <br />

              <TextField
                id="email"
                label="Email"
                type="email"
                className={classes.textField}
                margin="normal"
                name="email"
                onChange={this.onChange}
              />
              {errors.email && (
                <FormHelperText className={classes.red}>
                  {errors.email}
                </FormHelperText>
              )}
              <br />

              <TextField
                id="message"
                label="Message"
                className={classes.textField}
                margin="normal"
                name="message"
                onChange={this.onChange}
              />
              {errors.name && (
                <FormHelperText className={classes.red}>
                  {errors.message}
                </FormHelperText>
              )}
              <br />
              <Button variant="contained" color="primary" type="submit">
                Submit
              </Button>
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
