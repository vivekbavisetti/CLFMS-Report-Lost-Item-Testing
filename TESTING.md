# CLFMS — Software Testing Checklist

## Module Under Test

**Report Lost Item** — Campus Lost and Found Management System.

## Testing Tool

Selenium IDE was used for browser-based functional testing. phpMyAdmin was used to inspect saved database records.

## Test Cases

| Test ID | Scenario | Expected Result |
|---|---|---|
| TC01 | Submit a valid lost-item report | Success message appears and the report is saved |
| TC02 | Submit with required fields empty | Browser prevents submission |
| TC03 | Enter a future date | Application rejects the report |
| TC04 | Enter an invalid date | Application displays a validation message |
| TC05 | View previously submitted reports | Saved reports appear in the list |

## Execution Procedure

1. Start Apache and MySQL using XAMPP.
2. Open `http://localhost/CLFMS/report_lost_item.php`.
3. Execute the relevant test case using Selenium IDE or the browser.
4. Verify the displayed result.
5. Open phpMyAdmin and inspect `clfms.lost_items` to confirm database changes.

## Result Recording

Record the actual outcome of each test as **Pass**, **Fail**, or **Not Run** after execution. Keep screenshots of the testing tool and database results as supporting evidence.

## Notes

Test results must reflect actual execution. A test case should not be marked as passed unless its expected result was verified.
