=begin
	gets is the Ruby method that gets input from the user. 
	When getting input, Ruby automatically adds a blank 
	line (or newline) after each bit of input; chomp removes 
	that extra line. (Your program will work fine without 
	chomp, but you'll get extra blank lines everywhere.)
=end
print "What's your first name?"
$firstName = gets.chomp