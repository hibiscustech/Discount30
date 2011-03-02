# Be sure to restart your server when you modify this file.

# Your secret key for verifying cookie session data integrity.
# If you change this key, all old sessions will become invalid!
# Make sure the secret is at least 30 characters and all random, 
# no regular words or you'll be exposed to dictionary attacks.
ActionController::Base.session = {
  :key         => '_rails_project_session',
  :secret      => '17d711a976f03b3807498f7be9589c4b1652295ddb1098d698e2b1bd73e9d71fdbfa4d6621b120a72aa03a25aa745e1dc664ea9c40fc758181b56fe4ec499425'
}

# Use the database for sessions instead of the cookie-based default,
# which shouldn't be used to store highly confidential information
# (create the session table with "rake db:sessions:create")
# ActionController::Base.session_store = :active_record_store
