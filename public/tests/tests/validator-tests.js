describe('Validation tests:', function() {
	describe('Name tests:', function() {
	it('Expects a correct name to pass validation', function() {
		var name = 'Pesho',
		act = validator.validateName(name);
		expect(act).to.be.true;
	});
	it('Expects a number not to pass validation', function() {
		var name = 13,
		act = validator.validateName(name);
		expect(act).to.be.false;
	});
	it('Expects a name with weird characters not to pass validation', function() {
		var name = '<script>bad hacks</script>',
		act = validator.validateName(name);
		expect(act).to.be.false;
	});
});

describe('Email tests:', function() {
	it('Expects a valid email to pass validation', function() {
		var email = 'pesho@gmail.com',
		act = validator.validateEmail(email);
		expect(act).to.be.true;
	});
	it('Expects a valid email with weird domain to pass validation', function() {
		var email = 'pesho@pesho95.com',
		act = validator.validateEmail(email);
		expect(act).to.be.true;
	});
	it('Expects a valid email with weird characters to pass validation', function() {
		var email = 'pesho.95!#$%&*+-/=?^_`{|}~@gmail.com',
		act = validator.validateEmail(email);
		expect(act).to.be.true;
	});
	it('Expects a valid email with cyrillic characters to pass validation', function() {
		var email = 'пешо@gmail.com',
		act = validator.validateEmail(email);
		expect(act).to.be.true;
	});
	it('Expects a slightly invalid email to not pass validation', function() {
		var email = 'pe)sho@pesho95.com',
		act = validator.validateEmail(email);
		expect(act).to.be.false;
	});
	it('Expects very invalid email to not pass validation', function() {
		var email = '"(),:;<>@[\]@"(),:;<>@[\].com',
		act = validator.validateEmail(email);
		expect(act).to.be.false;
	});
	it('Expects a boolean value to not pass validation:', function() {
		var email = true,
		act = validator.validateEmail(email);
		expect(act).to.be.false;
	});
	it('Expects a number to not pass validation', function() {
		var email = 3,
		act = validator.validateEmail(email);
		expect(act).to.be.false;
	});
});

describe('Password tests:', function(){
	it('Expects a valid password to pass validation', function() {
		var password = 'Singapore1',
		act = validator.validatePassword(password);
		expect(act).to.be.true;
	});
	it('Expects a very long valid password to pass validation:', function() {
		var password = 'Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1',
		act = validator.validatePassword(password);
		expect(act).to.be.true;
	});
	it('Expects a very long valid password to pass validation:', function() {
		var password = 'Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1Singapore1',
		act = validator.validatePassword(password);
		expect(act).to.be.true;
	});
	it('Expects a valid password with digit in middle not to pass validation:', function() {
		var password = 'Sing1apore',
		act = validator.validatePassword(password);
		expect(act).to.be.false;
	});
	it('Expects a valid password not to pass validation:', function() {
		var password = 'Sing1',
		act = validator.validatePassword(password);
		expect(act).to.be.false;
	});
	it('Expects a short password not to pass validation:', function() {
		var password = 'Sing1',
		act = validator.validatePassword(password);
		expect(act).to.be.false;
	});
	it('Expects a password with no digits not to pass validation:', function() {
		var password = 'Singapore',
		act = validator.validatePassword(password);
		expect(act).to.be.false;
	});
	it('Expects a numeric password not to pass validation:', function() {
		var password = '123456',
		act = validator.validatePassword(password);
		expect(act).to.be.false;
	});
	it('Expects a boolean password not to pass validation:', function() {
		var password = true,
		act = validator.validatePassword(password);
		expect(act).to.be.false;
	});
	it('Expects a true-like password not to pass validation:', function() {
		var password = 1,
		act = validator.validatePassword(password);
		expect(act).to.be.false;
	});
});

describe('Description tests:', function(){
	it('Expects a valid description to pass validation', function() {
		var description = 'Does not bite Loves being pet Quite vindictive I sell it because I can no longer take care of it',
		act = validator.validateDescription(description);
		expect(act).to.be.true;
	});
	it('Expects a valid trimmed descripti to pass validation', function() {
		var description = '                         Does not bite Loves being pet Quite vindictive I sell it because I can no longer take care of it                       ',
		act = validator.validateDescription(description);
		expect(act).to.be.true;
	});
	it('Expects a short description to not pass validation', function() {
		var description = 'Enough?',
		act = validator.validateDescription(description);
		expect(act).to.be.false;
	});
	it('Expects a short (after trimming) description not to pass validation', function() {
		var description = 'Enough!                                                                                                       ',
		act = validator.validateDescription(description);
		expect(act).to.be.false;
	});
});
});
