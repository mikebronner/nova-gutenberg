# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [0.1.6] - 2019-06-05
### Added
- Laravel FileManager integration to allow for file uploads in the editor.
  Laravel FileManager is not an ideal solution, and hopefully we will have
  something more streamlined in the future.

### Changed
- After more testing it became clear that editing content after previously
  having used the editor would not function. For now code has been reverted to
  reloading the page if the editor was previously used. This is less than
  optimal, and we are hopefull that a better solution will be found in the near
  future.

## [0.1.5] - 2019-06-05
### Added
- Field will now render correctly in Index and Detail pages.

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
