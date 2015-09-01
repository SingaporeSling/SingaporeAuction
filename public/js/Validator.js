var validator = (function() {
	var CONSTS = {
		REGEXPS: {
			EMAIL: /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
			NAME: /^\w+$/,
			PASSWORD: {
				HAS_ENOUGH_LETTERS: /([A-Z]{6,})/gi,
				HAS_DIGIT: /[0-9]/
			}
		},
		DIGITS: {
			PASSWORD_MIN: 7,
			DESCRIPTION_MIN: 20,
			MIN_BID_INCREMENT: 1.1
		}

		function validateName(name) {
			var isString = typeof name === 'string',
			isValid = CONSTS.REGEXPS.NAME.test(name);

			if (isString && isValid) {
				return true;
			} else {
				return false;
			}
		}

		function validateEmail(email) {
			return CONSTS.REGEXPS.test(email);
		}

		function validatePassword(password) {
			var isString = typeof password === 'string',
			hasEnoughLetters = CONSTS.REGEXPS.PASSWORD.HAS_ENOUGH_LETTERS.test(password),
			hasDigit = CONSTS.REGEXPS.PASSWORD.HAS_DIGIT.test(password),
			hasCorrectLength = password.length >= CONSTS.REGEXPS.DIGITS.PASSWORD_MIN

			if (isString && hasDigit && hasEnoughLetters && hasCorrectLength) {
				return true;
			} else {
				return false;
			};
		}

		function validateDescription(description) {
			description = description.trim();
			var isLongEnough = description.length >= CONSTS.DIGITS.DESCRIPTION_MIN;
			if (validateName(description)) {
				return true;
			};
		}

		function validateBid(bidValue, oldValue) {
			var bidIsHighEnough = oldValue * CONSTS.DIGITS.MIN_BID_INCREMENT < bidValue;
			if (bidIsHighEnough) {
				return true;
			} else {
				return false;
			}
		}

		return {
			validateName: validateName, validatePassword: validatePassword, validateEmail: validateEmail, validateDescription: validateDescription
		}
	}());