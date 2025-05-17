# 🧪 TDD Challenges for Backend Chapter

This repository contains a collection of Test-Driven Development (TDD) challenges designed for backend developers. Each challenge is structured to be completed in a 45-minute collaborative session, with challenges organized by increasing difficulty.

# 🎯 Challenge Difficulty Levels
The challenges in this repository are organized by increasing difficulty:

- URL Shortener (Level 1) - Basic service with validation and error handling
- Password Validator (Level 2) - String validation with multiple rules and error reporting
- Bank Account (Level 3) - State management and formatted output
- Mars Rover (Level 4) - Complex domain logic and command processing
- Ticket Reservation (Level 5) - Multiple domain objects and business rules

Each challenge builds upon skills learned in previous challenges, introducing new concepts incrementally.

## 🚀 Available Challenges

Currently, the repository includes the following challenges:

- **[01-URL Shortener](/01-url-shortener)** - Implement a service that converts long URLs into unique short codes and retrieves the original URLs.
- **[02-Password Validator](/02-password-validator)** - Create a validator that ensures passwords meet security requirements with detailed error reporting.
- **[03-Bank Account](/03-bank-account)** - Develop a bank account service with deposits, withdrawals, and statement printing.
- **[04-Mars Rover](/04-mars-rover-challenge)** - Build a control system for a Mars rover that navigates a grid with obstacles.

More challenges will be added in the future.

## 💡 How to Use These Challenges

These challenges are designed for biweekly backend chapter knowledge-sharing sessions. Each challenge follows a common structure:

1. A clearly defined problem with specific requirements
2. Pre-configured testing environment with failing tests ❌
3. Interface definitions that solutions must implement
4. Step-by-step instructions for the TDD process

## 🔄 Running a TDD Session

Here's how to conduct an effective 45-minute TDD session:

1. **Introduction (5 minutes)**
    - Explain the challenge and TDD principles
    - Review the interface and requirements
    - Form groups of 3 developers

2. **TDD Coding Session with Role Rotation (30 minutes)**
    - Use a role rotation approach with 3 developers:
        * First developer writes a test
        * Second developer implements the code to make it pass ✅
        * Third developer writes the next test
        * First developer implements code for the second test
        * And so on...
    - This rotation ensures everyone gets to both write tests and implement code

3. **Discussion (10 minutes)**
    - Time to discuss any insights, challenges, or questions that arose
    - Share interesting approaches or solutions

## 🔧 Setup for Each Challenge

To work on a challenge:

1. Clone this repository:
   ```bash
   git clone https://github.com/Chris-Kol/tdd-challenges.git
   ```

2. Navigate to the challenge directory:
   ```bash
   cd 01-url-shortener
   ```

3. Read the README.md in the challenge directory for specific instructions

4. Install dependencies:
   ```bash
   composer install
   ```

5. Run the tests to see what needs to be implemented:
   ```bash
   composer test
   ```

6. Implement the solution following TDD principles

## 🤝 Contributing New Challenges

To add a new challenge to this repository:

1. Create a new directory with a number prefix and descriptive name (e.g., `06-event-emitter`)
2. Include a clear README.md with requirements and instructions 
3. Set up a composer.json file with necessary dependencies 
4. Create interface definitions and exception classes 
5. Write failing tests that guide participants through the implementation 
6. Provide a basic project structure without the solution

## 📜 License

This project is open source and available under the [MIT License](/LICENSE).

Remember: Red ❌ → Green ✅ → Refactor 🔄