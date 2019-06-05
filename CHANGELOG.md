# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [0.1.4] - 2019-06-04
### Changed
- Added styling to match Nova input field standards.

## [0.1.3] - 2019-06-04
### Fixed
- Resolved issue with editing content, which was previously dealt with by
  forcefully reloading the page. This has now been resolved to not require a
  page refresh.

## [0.1.2] - 2019-06-04
### Fixed
- Editor would not load correct content when using it after it had been
  previously used. A work-around has been implemented to for the page to refresh
  if the editor had previously been used.

## [0.1.1] - 2019-06-04
### Fixed
- Content would previously not save.
- Saved content previously didn't load in the editor.

## [0.1.0] - 2019-05-22
Initial implementation.
