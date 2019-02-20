# BCGov Looker/Snowplow WordPress plugin

BCGov WordPress plugin for embedding Snowplow data collection on all public pages

## Getting Started

Install the plugin by copying or cloning the repo in to the plugins folder:
```bash
# Clone the plugin
git clone https://github.com/SteveMHoward/bcgov-looker-snowplow.git
```

## Folder Structure

```
bcgov-looker-snowplow.php     - Base plugin file with hooks and run code
├───admin/                    - Code for admin-specific functionality
├───includes/                 - Code and hooks shared by admin and public
├───public/                   - Code for public-facing functionality
```

## License

```
Copyright 2018 Province of British Columbia

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```

## Credits

The plugin structure is based on [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate