# membershipValidation

This CiviCRM extension uses APIv4 calls, first to retrieve the Contact via the form's input and then to the Membership entity, to check if a user has an exisiting, active membership to prevent them from purchasing a new one before the dates of service have expired.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.4+
* CiviCRM : 5.9

## Installation (Web UI)

Learn more about installing CiviCRM extensions in the [CiviCRM Sysadmin Guide](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/).

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl membershipcontrol@https://github.com/FIXME/membershipcontrol/archive/master.zip
```
or
```bash
cd <extension-dir>
cv dl membershipcontrol@https://lab.civicrm.org/extensions/membershipcontrol/-/archive/main/membershipcontrol-main.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/FIXME/membershipcontrol.git
cv en membershipcontrol
```
or
```bash
git clone https://lab.civicrm.org/extensions/membershipcontrol.git
cv en membershipcontrol
```

## Getting Started

The `form` on which to load this extension is hard coded by it's id, as is the membership statuses that the API will retrieve. These should be updated within `membershipcontrol.php` to meet the needs of your unique CiviCRM instance.

Once those changes are made, enable this extension and the membership validation will be active on your site!
