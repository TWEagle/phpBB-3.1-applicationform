phpBB-3.1-applicationform
=========================

phpBB 3.1 extension that allows users to apply for a certain team positions. The applications are sent to a forum, as chosen in the ACP settings of the extension, where administrators can read them and see if the users are the best for the position.

[![Build Status](https://travis-ci.org/RMcGirr83/phpBB-3.1-applicationform.svg?branch=master)](https://travis-ci.org/RMcGirr83/phpBB-3.1-applicationform)
## Installation

### 1. clone
Clone (or download and move) the repository into the folder ext/rmcgirr83/applicationform:

```
cd phpBB3
git clone https://github.com/RMcGirr83/phpBB-3.1-applicationform.git ext/rmcgirr83/applicationform/
```

### 2. activate
Go to admin panel -> tab customise -> Manage extensions -> enable Application Form

Within the Admin panel visit the Extensions tab and choose the settings (allow, require on registration, display message) for the extension.

## Update instructions:
1. Go to you phpBB-Board > Admin Control Panel > Customise > Manage extensions > Application Form: disable
2. Delete all files of the extension from ext/rmcgirr83/applicationform
3. Upload all the new files to the same locations
4. Go to you phpBB-Board > Admin Control Panel > Customise > Manage extensions > Application Form: enable
